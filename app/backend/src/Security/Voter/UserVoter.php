<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class UserVoter extends Voter
{

    public const USER_READ = 'user_read';
    public const USER_EDIT = 'user_edit';
    public const USER_ADD = 'user_add';
    public const USER_DELETE = 'user_delete';

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, [self::USER_READ, self::USER_EDIT, self::USER_DELETE]) && $subject instanceof \App\Entity\User;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        // Get User via TokenInterface
        $user = $token->getUser();

        // Check if the User is anonymous
        if (!$user instanceof UserInterface)  return false;

        // Do not allow if is User has not identifier
        if ($user->getUserIdentifier() === null) return false;

        switch ($attribute) {

                // Checking permission if read this User
            case self::USER_READ:
                return $this->canRead($subject, $user);
                break;

                // Checking permission if edit this User
            case self::USER_EDIT:
                return $this->canEdit($subject, $user);
                break;

                // Checking permission if add this User
            case self::USER_ADD:
                return $this->canAdd($subject, $user);
                break;

                // Checking permission if delete this User
            case self::USER_DELETE:
                return $this->canDelete($subject, $user);
                break;
        }
        return false;
    }


    /**
     * Check for permission read a User
     *
     * @param User $subject
     * @param User $user
     * @return boolean
     */
    private function canRead(User $subject, User $user)
    {
        return $subject === $user;
    }

    /**
     * Check for permission edit a User
     *
     * @param User $subject
     * @param User $user
     * @return boolean
     */
    private function canEdit(User $subject, User $user)
    {
        return $subject === $user;
    }

    /**
     * Check for permission create new User
     *
     * @param User $subject
     * @param User $user
     * @return boolean
     */
    private function canAdd(User $subject, User $user)
    {
        return $subject === $user;
    }


    /**
     * Check for permission delete a User
     *
     * @param User $subject
     * @param User $user
     * @return boolean
     */
    private function canDelete(User $subject, User $user)
    {
        return $subject === $user;
    }
}
