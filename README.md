# Kohana module for Instagram API access
* Kohana Version: 3.3

Notice: This is just a first draft of this module and does not support all API endpoints yet. Give me
some days to implement the missing parts. Feedback is welcome!!

## Getting started
This is a short instruction how to setup this module and get data from Instagram API within your Kohana application.

### Include this module into your project as a git submodule
    (TODO: Insert code example)

### Enable this module in your applications bootstrap file

    Kohana::modules(array
    (
        // ...
        'instagram' => MODPATH . 'kohana-instagram',
    ));

### Setup the instagram configuration file
Create a instagram.php file in to applications config folder and insert your instagram credentials

    return array
    (
        'client_id' => '<YOUR CLIENT ID>',

        'client_secret' => '<YOUR CLIENT SECRET>',

        'redirect_url' => '<YOUR REDIRECT URL>,
    );

Now you are able to use this module within your applications controller classes

## Connect to Instagram
The next step is to implement the login with your instagram account to access your data. The first step ist to assign
the login url to your template the user has to click.

    $instagram = Instagram::instance();
    $this->template->login_url = $instagram->login_url();

When the users clicks this link on your website, they will have to login at Instagram. After successfully login they
will be redirected to your application (the url you defined as redirect url). Now there is a GET parameter 'code'
in your URL, you can use for getting an access_token. This token is required for authentication.

    $code = $this->request->query('code');
    $instagram->request_oauth_token($code, TRUE);

That's all. Now you have access to your Instagram data. Example:

    $media = $instagram->get_user_media();

    foreach ($media as $item)
    {
        $img = $item->get_thumbnail();

        echo '<img src="' . $img->url . '" width="' . $img->width . '" height="' . $img->height . '" title="' . $item->get_title() . '">';
    }



