<?php


namespace frontend\services\auth;


use common\entities\User;
use frontend\forms\SignupForm;
use yii\mail\MailerInterface;
use common\repositories\UserRepository;

class SignupService
{
    private $mailer;
    private $users;

    public function __construct(UserRepository $users, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        $this->users = $users;
    }


    public function signup(SignupForm $form): void
    {
        $user = User::requestSignup(
          $form->username,
          $form->email,
          $form->password
        );
        $this->users->save($user);
    }

}