<?php

namespace app\models;

class TmpUserModel extends AppModel {

    protected $table = 'tmp_user';
    
    public $attributes = [
        'token' => '',
        'type' => '',
        'expired' => '',
        'meta' => '',
    ];

    public $rules = [
        'required' => [
            ['token', 'type', 'expired'],
        ],
        'in' => [
            ['type', [
                'REGISTRATION', 
                'CHANGE_PASSWORD', 
                'CHANGE_EMAIL',
                'NEW_EMAIL',
                'CREATE_PASSWORD', 
                'RESET_PASSWORD'
                ]
            ]
        ]
    ];

    public function getAllByEmail($email) {
        $sql = "
            SELECT * FROM {$this->table}
            WHERE email = ?
        ";
        
        $res = $this->db->query($sql, [$email]);

        return $res;
    }

    public function saveTmpUser($data) {
        $this->load($data);

        if ($this->validate()) {
            return $this->save();
        } else {
            $this->logErrors();
            
            return false;
        }
    }

    public function deleteById($id) {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id = ?
        ";
        $this->db->execute($sql, [$id]);
    }

    public function findByToken($token) {
        $res = $this->findOne($token, 'token');

        if (!empty($res)) {
            $tmp_user = $res[0];

            if (isExpired($tmp_user['expired'])) {
                $this->deleteById($tmp_user['id']);
            } else {
                return $tmp_user;
            }
        } 

        return false;
    }

    public function newFromToken($token) {
        $user = $this->findByToken($token);

        if ($user) {
            if ($user['type'] == 'REGISTRATION') {
                if (!isExpired($user['expired'])) {
                    $user_model = new UserModel();
                    $data = [
                        'email' => $user['email'],
                        'password' => $user['token'],
                    ];
                    
                    $saved = $user_model->saveUser($data);

                    if ($saved) {
                        $this->deleteById($user['id']);
                    }

                    return true;
                } else {
                    $this->deleteById($user['id']);
                }
            }
        }

        return false;
    }
}