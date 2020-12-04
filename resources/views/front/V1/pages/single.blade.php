@extends('front.V1.layout.app')
@section('seo_title', $page->seo_title)
@section('seo_description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('style')
    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">

        .mailchimp-wrapper {
            width: 90%;
            margin: 10% 0;
        }

        .box {
            box-shadow: 0 0 10px #afc0d9;
            background-color: #fff;
            padding: 10px;
            border-radius: .25rem;
            text-align: center;
        }

        p {
            margin-top: 10px;
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: 300;
        }

        input {
            border: 1px solid rgb(220, 219, 235);
            border-radius: 4px;
            font-size: 13px;
            padding: 10px;
            color: #000;
            transition: all .15s ease-in;
        }

        input[type=email] {
            width: 60%;
            display: inline-block;
            height: 4.5rem;
            margin: 0;
        }

        input[type=submit] {
            background-color: rgb(53, 114, 210);
            color: #fff;
            font-weight: bold;
            border: 1px solid transparent;
            padding: 0 0.5rem;
            height: 4.5rem;
            line-height: 4rem;
            font-family: sans-serif;
        }

        input[type=submit]::focus {
            border: 1px solid #fff;
        }

        input:focus {
            border-color: rgb(53, 114, 210);
            box-shadow: 0px 0px 8px 2px rgba(53, 114, 210, .5);
            outline: none;
        }

        input::placeholder {
            color: #999;
        }

        #subscribe-result p {
            margin-top: 35px;
        }

        form{
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <!-- site content
        ================================================== -->
    <div class="s-content content">
        <main class="row content__page">

            <article class="column large-full entry format-standard">

                <div class="media-wrap entry__media">
                    <div class="entry__page-thumb">
                        <img src="{{asset('storage/coverimages/'.$page->cover_image)}}"
                             sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                    </div>
                </div>

                <div class="content__page-header entry__header">
                    <h1 class="display-1 entry__title">
                        {{$page->title}}
                    </h1>
                </div> <!-- end entry__header -->

                <div class="entry__content">
                    {!! $page->body !!}
                </div> <!-- end entry content -->
            </article> <!-- end column large-full entry-->

            <div class="mailchimp-wrapper">
                <h4 style="color: #0e5b44">Abunə olmağı unutmayın</h4>
                <div class="box">
                    <form action="https://seom.us4.list-manage.com/subscribe/post-json?u=b487916edd0def3f98e9ce35a&amp;id=5db97f9b0b&c=?"
                          method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="mail ünvanınız" required>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_e44c1f194bec93e238615469e_f6f826e769" tabindex="-1" value="">
                        </div>
                        <input type="submit" value="ABUNƏLİYİ TƏSDİQLƏ" name="subscribe" id="mc-embedded-subscribe" class="mc-button">
                        <div id="subscribe-result">
                        </div>
                    </form>
                </div>
            </div>
        </main>

    </div> <!-- end s-content -->

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            var $form = $('#mc-embedded-subscribe-form')
            if ($form.length > 0) {
                $('form input[type="submit"]').bind('click', function (event) {
                    if (event) {
                        event.preventDefault()
                        register($form)
                    }
                })
            }
        })

        function register($form) {
            $('#mc-embedded-subscribe').val('Gözləyin...');
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                error: function (err) { alert('Could not connect to the registration server. Please try again later.') },
                success: function (data) {
                    $('#mc-embedded-subscribe').val('subscribe')
                    if (data.result === 'success') {
                        // Yeahhhh Success
                        console.log(data.msg)
                        $('#mce-EMAIL').css('borderColor', '#ffffff')
                        $('#subscribe-result').css('color', 'rgb(53, 114, 210)')
                        $('#subscribe-result').html('<p>Abunə olduğunuz üçün təşəkkür edirik.</p>')
                        $('#mce-EMAIL').val('')
                    } else {
                        // Something went wrong, do something to notify the user.
                        console.log(data.msg)
                        $('#mce-EMAIL').css('borderColor', '#ff8282')
                        $('#subscribe-result').css('color', '#ff8282')
                        $('#subscribe-result').html('<p>' + data.msg.substring() + '</p>')
                    }
                }
            })
        };
    </script>
@endsection
