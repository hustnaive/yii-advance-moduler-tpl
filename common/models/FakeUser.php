<?php
namespace common\models;

use Yii;
use yii\base\Component;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

class FakeUser extends Component implements IdentityInterface {
    
    static $USERS = [
        'admin'=>'admin',
        'test'=>'test',
    ];
    
    public $username;
    public $password;
    
    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id) 
    {
        if(array_key_exists($id, self::$USERS)) {
            return \Yii::createObject(['class'=>self::className(),'username'=>$id,'password'=>self::$USERS[$id]]);
        }
        else return null;
    }
    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
    */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
    */
    public function getId()
    {
        return $this->username;
    }
    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
    */
    public function getAuthKey()
    {
        return sha1($this->username);
    }
    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
    */
    public function validateAuthKey($authKey)
    {
        return sha1($this->username) == $authKey;
    }
    
    public function validatePassword($password) {
        return strcmp($password, $this->password) == 0;
    }
}