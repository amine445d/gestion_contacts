<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContacts()
    {
        return $this->contactRepository->getAll();
    }

    public function getContactById($id)
    {
        return $this->contactRepository->findById($id);
    }

    public function createContact($data)
    {
        return $this->contactRepository->create($data);
    }

    public function updateContact($id, $data)
    {
        return $this->contactRepository->update($id, $data);
    }

    public function deleteContact($id)
    {
        return $this->contactRepository->delete($id);
    }
}