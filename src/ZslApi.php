<?php

namespace Edzhub\Zslapi;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ZslApi
{
    private const DEFAULT_URL = 'https://content.zerosciencelab.com/api/';
    private const GET_CLASSES = 'Classes/get';
    private const GET_SUBJECTS = 'Classes/get_subjects';
    private const GET_CHAPTERS = 'Chapter/get';
    private const GET_LINK = 'Link/get';
    private const CREATE_USER = 'Create/User';
    private const GET_CLASS_LINKS = 'Classes/getLinks';
    private const GET_CHAPTER_LINKS = 'Chapter/getLinks';

    /**
     * @return PromiseInterface|Response
     */
    public static function getClasses($token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        return Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CLASSES);
    }

    /**
     * @param $class
     * @param null $token
     * @return PromiseInterface|Response
     */
    public static function getSubjects($class, $token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        return Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_SUBJECTS, ['class' => $class]);
    }

    /**
     * @param $class
     * @param $subject
     * @param null $token
     * @return PromiseInterface|Response
     */
    public static function getChapters($class, $subject, $token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        return Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CHAPTERS, ['class' => $class, 'subject' => $subject]);
    }

    /**
     * @param null $identifier
     * @return PromiseInterface|Response
     */
    public static function createUser($identifier = null, $token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        return Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::CREATE_USER, ['identifier' => $identifier]);
    }

    /**
     * @param $chapter
     * @param $link
     * @param $token
     * @return PromiseInterface|Response
     */
    public static function getLink($chapter, $link, $token)
    {
        return Http::withToken($token)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_LINK, ['chapter' => $chapter, 'link' => $link]);
    }

    /**
     * @param $class
     * @param null $token
     * @return PromiseInterface|Response
     */
    public static function getClassLinks($class, $token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        return Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CLASS_LINKS, ['class' => $class]);
    }

    public static function getChapterLinks($chapter, $token = null)
    {
        $httpToken = $token ?? \config('zslapi.MANAGER_TOKEN');
        return Http::withToken($httpToken)->acceptJson()->post(config('zslapi.CONTENT_URL', self::DEFAULT_URL) . self::GET_CHAPTER_LINKS, ['chapter' => $chapter]);
    }

}