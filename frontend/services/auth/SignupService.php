<?php


namespace frontend\services\auth;


use common\entities\User;
use frontend\forms\SignupForm;
use yii\mail\MailerInterface;

class SignupService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }


    public function signup(SignupForm $form): void
    {
        $user = User::requestSignup(
          $form->username,
          $form->email,
          $form->password
        );

        throw new \RuntimeException('Saving error.');
    }

}