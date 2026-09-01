<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;

class User extends BaseController
{
    protected $usermodel;
    protected $groupmodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->groupmodel = new GroupModel();
    }

    public function index()
    {
        $users = $this->usermodel
            ->select('users.id,
                      users.username,
                      users.email,
                      auth_groups.name as role')
            ->join(
                'auth_groups_users',
                'auth_groups_users.user_id = users.id'
            )
            ->join(
                'auth_groups',
                'auth_groups.id = auth_groups_users.group_id'
            )
            ->asArray()
            ->findAll();

        $data = [
            'pageTitle' => 'Kelola User',
            'users' => $users
        ];

        return view('apps/users/users', $data);
    }


    public function tambah()
    {
        $data = [
            'pageTitle' => 'Tambah User',
            'groups' => $this->groupmodel
                ->asArray()
                ->findAll()
        ];

        return view('apps/users/form_tambah', $data);
    }


    public function simpan()
    {
        $user = new \Myth\Auth\Entities\User();

        $user->username = $this->request->getPost('username');
        $user->email = $this->request->getPost('email');
        $user->password = $this->request->getPost('password');
        $user->active = 1;

        $this->usermodel->save($user);

        $userId = $this->usermodel->getInsertID();

        $this->groupmodel->addUserToGroup(
            $userId,
            $this->request->getPost('role')
        );

        return redirect()
            ->to('/users')
            ->with(
                'success',
                'User berhasil ditambahkan'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT USER
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $user = $this->usermodel
            ->select('
                users.id,
                users.username,
                users.email,
                auth_groups.name as role
            ')
            ->join(
                'auth_groups_users',
                'auth_groups_users.user_id = users.id'
            )
            ->join(
                'auth_groups',
                'auth_groups.id = auth_groups_users.group_id'
            )
            ->where('users.id', $id)
            ->asArray()
            ->first();

        if (!$user)
        {
            return redirect()
                    ->to('/users')
                    ->with(
                        'error',
                        'User tidak ditemukan'
                    );
        }

        $data = [
            'pageTitle' => 'Edit User',
            'user'      => $user,
            'groups'    => $this->groupmodel
                                ->asArray()
                                ->findAll()
        ];

        return view(
            'apps/users/form_edit',
            $data
        );
    }


    public function update($id)
    {
        $user = $this->usermodel->find($id);

        if (!$user)
        {
            return redirect()
                    ->to('/users')
                    ->with(
                        'error',
                        'User tidak ditemukan'
                    );
        }

        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');
        $role     = $this->request->getPost('role');

        if (
            empty($username) ||
            empty($email) ||
            empty($role)
        )
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'warning',
                        'Semua data wajib diisi'
                    );
        }

        try
        {
            // Update username dan email
            $this->usermodel->update(
                $id,
                [
                    'username' => $username,
                    'email'    => $email
                ]
            );


            // Cari group berdasarkan nama role
            $group = $this->groupmodel
                ->where('name', $role)
                ->first();


            if (!$group)
            {
                return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'warning',
                            'Role tidak ditemukan'
                        );
            }


            // Hapus role lama
            $this->groupmodel
                ->removeUserFromAllGroups($id);


            // Tambahkan role baru menggunakan ID group
            $this->groupmodel
                ->addUserToGroup(
                    (int) $id,
                    (int) $group->id
                );


            return redirect()
                    ->to('/users')
                    ->with(
                        'success',
                        'Data user berhasil diperbarui'
                    );

        }
        catch(\Exception $e)
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Gagal memperbarui data user'
                    );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE USER
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        if ($id == user()->id) {

            return redirect()
                ->to('/users')
                ->with(
                    'warning',
                    'Tidak bisa menghapus akun yang sedang digunakan'
                );
        }

        $user = $this->usermodel->find($id);

        if (!$user) {

            return redirect()
                ->to('/users')
                ->with(
                    'error',
                    'User tidak ditemukan'
                );
        }

        $this->usermodel->delete($id);

        return redirect()
            ->to('/users')
            ->with(
                'success',
                'User berhasil dihapus'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | RESET PASSWORD
    |--------------------------------------------------------------------------
    */

    public function reset($id)
    {
        $passwordBaru = '12345678';

        $user = $this->usermodel->find($id);

        if (!$user) {

            return redirect()
                ->to('/users')
                ->with(
                    'error',
                    'User tidak ditemukan'
                );
        }

        $user->password = $passwordBaru;

        $this->usermodel->save($user);

        return redirect()
            ->to('/users')
            ->with(
                'success',
                'Password berhasil direset menjadi: ' . $passwordBaru
            );
    }
}