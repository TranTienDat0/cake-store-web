<?php
namespace App\Http\Controllers;

use App\Common\Constants;
use App\Jobs\Auth\InvitationVerifyMailJob;
use App\Repositories\Interfaces\InvitationRepository;
use App\Repositories\Interfaces\UserVerifyTokenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\Auth\PersonalInformationRequest;
use App\Repositories\Interfaces\StaffSuperiorRepository;
use App\Repositories\Interfaces\UserGroupRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Hash;

class checkoutController extends Controller
{
    protected $invitationRepository;
    protected $userVerifyTokenRepository;
    protected $userRepository;
    protected $userGroupRepository;
    protected $staffSuperiorRepository;

    public function __construct(
        InvitationRepository $invitationRepository,
        UserVerifyTokenRepository $userVerifyTokenRepository,
        UserRepository $userRepository,
        UserGroupRepository $userGroupRepository,
        StaffSuperiorRepository $staffSuperiorRepository
    ) {
        $this->invitationRepository = $invitationRepository;
        $this->userVerifyTokenRepository = $userVerifyTokenRepository;
        $this->userRepository = $userRepository;
        $this->userGroupRepository = $userGroupRepository;
        $this->staffSuperiorRepository = $staffSuperiorRepository;
    }
function invitation($token) {
        $title = "Register";
        $invitation = $this->invitationRepository->findWhereFirst(['token' => $token, 'status' => Constants::INVITATION_STATUS_INVITE]);
        if (!$invitation) {
            abort(404);
        }
        return view('auth.register-email', compact('title', 'invitation'));
    }

    function confirmEmail($token, Request $request) {
        $params = $request->all();
        $invitation = $this->invitationRepository->findWhereFirst(['token' => $token, 'status' => Constants::INVITATION_STATUS_INVITE]);
        if (!$invitation || ($params['email'] !== $invitation['email'])) {
            return redirect()->route('invitation.register', $invitation->token);
        }
        $this->generateTokenAndSendMail($invitation['email']);
        return redirect()->route('invitation.verify', $invitation->token);
    }
    # end region SPI-01

    # region SPI-02
    function verify($token) {
        $title = "Verify Email";
        $invitation = $this->invitationRepository->findWhereFirst(['token' => $token, 'status' => Constants::INVITATION_STATUS_INVITE]);
        if (!$invitation) {
            abort(404);
        }
        $verifyToken = $this->userVerifyTokenRepository->findWhereFirst([
            'email' => $invitation['email'],
            'type' => Constants::VERIFY_TOKEN_TYPE_REGISTER,
            'verified_at' => null,
        ]);
        $allowResend = true;
        if ($verifyToken && Carbon::now()->subSeconds(60)->toDateTimeString() < $verifyToken['updated_at']) {
            $allowResend = false;
        }
        return view('auth.register-verify', compact('title', 'invitation', 'allowResend'));
    }

    function verified($token, Request $request) {
        $params = $request->all();
        $invitation = $this->invitationRepository->findWhereFirst(['token' => $token, 'status' => Constants::INVITATION_STATUS_INVITE]);
        if (!$invitation) {
            abort(404);
        }

        $verifyToken = $this->userVerifyTokenRepository->findWhereFirst([
            'email' => $invitation['email'],
            'type' => Constants::VERIFY_TOKEN_TYPE_REGISTER,
            'verified_at' => null,
        ]);
        if (!$verifyToken || $verifyToken['token'] !== $params['verify_token']) {
            $errors = new MessageBag();
            $errors->add('verify_token', 'OTP is invalid!');
            return redirect()->route('invitation.verify', $token)->withErrors($errors);
        }
        if (Carbon::now()->subMinute(Constants::TIME_EXPIRE_TOKEN)->toDateTimeString() > $verifyToken['updated_at']) {
            $errors = new MessageBag();
            $errors->add('verify_token', 'OTP is expire!');
            return redirect()->route('invitation.verify', $token)->withErrors($errors);
        }
        $this->userVerifyTokenRepository->update(['verified_at' => Carbon::now()], $verifyToken->id);
        return redirect()->route('invitation.information', $token);
    }
}