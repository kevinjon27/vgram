<?php

namespace InstagramAPI;

class ProfileResponse extends Response
{
    public $username;
    public $phone_number;
    public $has_anonymous_profile_picture;
    public $hd_profile_pic_versions;
    public $gender;
    public $birthday;
    public $needs_email_confirm;
    public $national_number;
    public $profile_pic_url;
    public $profile_pic_id;
    public $biography;
    public $full_name;
    public $pk;
    public $country_code;
    public $hd_profile_pic_url_info;
    public $email;
    public $is_private;
    public $external_url;

    public function __construct($response)
    {
        if (self::STATUS_OK == $response['status']) {
            foreach ($response['user'] as $p => $v) {
                $this->$p = $v;
            }
            $this->hd_profile_pic_url_info = new HdProfilePicUrlInfo($this->hd_profile_pic_url_info);
            if (isset($this->hd_profile_pic_versions)) {
                $profile_pics_vers = [];
                foreach ($this->hd_profile_pic_versions as $profile_pic) {
                    $profile_pics_vers[] = new HdProfilePicUrlInfo($profile_pic);
                }
                $this->hd_profile_pic_versions = $profile_pics_vers;
            }
        } else {
            $this->setMessage($response['message']);
        }
        $this->setStatus($response['status']);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function hasAnonymousProfilePicture()
    {
        return $this->has_anonymous_profile_picture;
    }

    /**
     * @return HdProfilePicUrlInfo[]
     */
    public function getHdProfilePicVersions()
    {
        return $this->hd_profile_pic_versions;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function needsEmailConfirm()
    {
        return $this->needs_email_confirm;
    }

    public function getNationalNumber()
    {
        return $this->national_number;
    }

    public function getProfilePicUrl()
    {
        return $this->profile_pic_url;
    }

    public function getProfilePicId()
    {
        return $this->profile_pic_id;
    }

    public function getBiography()
    {
        return $this->biography;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getUsernameId()
    {
        return $this->pk;
    }

    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @return HdProfilePicUrlInfo
     */
    public function getHdProfilePicUrlInfo()
    {
        return $this->hd_profile_pic_url_info;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function isPrivate()
    {
        return $this->is_private;
    }

    public function getExternalUrl()
    {
        return $this->external_url;
    }
}
