## 联合登录

**如果您使用的是Laravel 5.3或更低版本，请使用[Socialite 2.0](https://github.com/laravel/socialite/tree/2.0).**

适用于其他平台的适配器在社区驱动的 [Socialite Providers](https://socialiteproviders.github.io/) 网站上列出.

```
   composer require laravel/socialite
```
## 安装qq

- 如果您已经添加它Laravel\Socialite\SocialiteServiceProvider，请从config\app.php阵列providers[]中移除。
- 添加\SocialiteProviders\Manager\ServiceProvider::class到你config\app.php的providers[]数组中

例如：
```php
  'providers' => [
      // a whole bunch of providers
      // remove 'Laravel\Socialite\SocialiteServiceProvider',
      \SocialiteProviders\Manager\ServiceProvider::class, // add
  ];
```

##事件监听器
- 将SocialiteProviders\Manager\SocialiteWasCalled事件添加到您的listen[]数组中app/Providers/EventServiceProvider。
- 将您的听众（即来自提供商的听众）添加到SocialiteProviders\Manager\SocialiteWasCalled[]您刚刚创建的听众。
- 你为这个提供者添加的监听器是'SocialiteProviders\\QQ\\QqExtendSocialite@handle',。
- 注意：除非您用自己的提供者覆盖它们，否则不需要为内置的社交网站提供商添加任何内容。

例如：

```php
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\\QQ\\QqExtendSocialite@handle',
        ],
    ];
```

##配置设置
**添加到config/services.php。**

```php
    'qq' => [
        'client_id' => env('QQ_KEY'),
        'client_secret' => env('QQ_SECRET'),
        'redirect' => env('QQ_REDIRECT_URI')
    ],
```