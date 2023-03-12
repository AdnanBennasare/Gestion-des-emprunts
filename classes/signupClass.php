

<?php
class Adherent {
    public $code_adherent;
    public $nome;
    public $adresse;
    public $email;
    public $phone;
    public $cin;
    public $date_birth;
    public $type;
    public $penaltie;
    public $nickname;
    public $password;
    public $date_creation;
    public $admin;

    public function __construct($code_adherent, $nome, $adresse, $email, $phone, $cin, $date_birth, $type, $penaltie, $nickname, $password, $date_creation, $admin) {
        $this->code_adherent = $code_adherent;
        $this->nome = $nome;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->phone = $phone;
        $this->cin = $cin;
        $this->date_birth = $date_birth;
        $this->type = $type;
        $this->penaltie = $penaltie;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->date_creation = $date_creation;
        $this->admin = $admin;
    }
}
?>





