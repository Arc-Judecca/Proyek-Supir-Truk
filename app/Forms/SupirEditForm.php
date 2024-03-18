<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SupirEditForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('id_supir', 'text', [
                'label' => 'ID Supir',
                'rules' => 'required',
                'default_value' => $this->getModel()->id_supir ?? '', // Menetapkan nilai default dari model, dengan mengakses properti 'id_supir' dan menambahkan null coalescing operator untuk mengatasi kemungkinan nilai null
            ])
            ->add('nama_supir', 'text', [
                'label' => 'Nama Supir',
                'rules' => 'required',
                'default_value' => $this->getModel()->nama_supir ?? '', // Menetapkan nilai default dari model, dengan mengakses properti 'nama_supir' dan menambahkan null coalescing operator untuk mengatasi kemungkinan nilai null
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'rules' => 'required|email|unique:users,email,'.optional($this->getModel()->user)->id, // Menambahkan aturan validasi untuk email yang unik, dengan menambahkan null coalescing operator untuk mengakses properti 'id' dari objek 'user' dan menggunakan fungsi 'optional' untuk memastikan bahwa properti tersebut tidak akan menyebabkan error jika bernilai null
                'default_value' => optional($this->getModel()->user)->email ?? '', // Menetapkan nilai default dari model, dengan mengakses properti 'email' dari objek 'user' dan menggunakan fungsi 'optional' untuk memastikan bahwa properti tersebut tidak akan menyebabkan error jika bernilai null
            ])
            ->add('password', 'password', [
                'label' => 'Password',
                'rules' => 'nullable|min:8|confirmed', // Password bersifat opsional
            ])
            ->add('password_confirmation', 'password', [
                'label' => 'Confirm Password',
                'rules' => 'nullable|same:password', // Konfirmasi password harus sama dengan password
            ])
            ->add('submit', 'submit', ['label' => 'Update']);
    }
}
