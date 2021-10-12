<?php

namespace Edzhub\Zslapi;

use Illuminate\Support\Facades\Http;

class ZslApi
{
    const DEFAULT_URL = 'https://content.zerosciencelab.com/api/';
    const GET_CLASSES = 'Classes/get';
    const GET_SUBJECTS = 'Classes/get_subjects';
    const GET_CHAPTERS = 'Chapter/get';
    const GET_LINK = 'Link/get';
    const CREATE_USER = 'Create/User';

    /**
     * @return array|mixed
     */
    public static function getClasses()
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CLASSES);
        return $response->json();
    }

    /**
     * @param $class
     * @return array|mixed
     */
    public static function getSubjects($class)
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_SUBJECTS, ['class' => $class]);
        return $response->json();
    }

    /**
     * @param $class
     * @param $subject
     * @return array|mixed
     */
    public static function getChapters($class, $subject)
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CHAPTERS, ['class' => $class, 'subject' => $subject]);
        return $response->json();
    }

    /**
     * @param null $identifier
     * @return array|mixed
     */
    public static function createUser($identifier = null)
    {
        $response = Http::withToken(\config('zslapi.MANAGER_TOKEN'))->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::CREATE_USER, ['identifier' => $identifier]);
        return $response->json();
    }

    /**
     * @param $chapter
     * @param $link
     * @param $token
     * @return array|mixed
     */
    public function getLink($chapter, $link, $token)
    {
        $response = Http::withToken($token)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_LINK, ['chapter' => $chapter, 'link' => $link]);
        return $response->json();
    }

}