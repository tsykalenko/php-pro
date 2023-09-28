<?php

class UserService
{
    protected $userRepository;
    protected $emailService;
    protected $smsService;
    protected $db;

    public function __construct(
        UserRepository $userRepository,
        EmailService $emailService,
        SMSService $smsService,
    ) {
        $this->userRepository = $userRepository;
        $this->emailService = $emailService;
        $this->smsService = $smsService;
    }

    public function registerUser($userData)
    {
        $this->userRepository->registerUser($userData);
        $this->emailService->sendWelcomeEmail($userData['email'], 'Ласкаво просимо');
        $this->smsService->sendSMS($userData['phone'], 'Вітаємо з реєстрацією!');
    }
}
