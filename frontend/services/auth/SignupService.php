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
        $this->save($user);
    }

    private function getByEmailConfirmToken(string $token): User
    {
        if (!$user = User::findOne(['email_confirm_token' => $token])) {
            throw new \DomainException('User is not found.');
        }
        return $user;
    }

    private function save(User $user): void
    {
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

}