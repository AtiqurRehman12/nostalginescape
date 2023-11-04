@extends('frontend.layouts.app')
@push('after-styles')
    <style>
        /* color:  red#ec1c24, black#212d31, grey#343a40, white#eee  */
        * {
            box-sizing: border-box;
        }

        .contain {
            background-color: transparent;
            max-width: 1170px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 170px;
            padding: 1em;
        }

        div.form {
            background-color: transparent;
        }

        .contact-wrapper {
            margin: auto 0;
        }

        .submit-btn {
            float: left;
        }

        .reset-btn {
            float: right;
        }

        .form-headline:after {
            content: "";
            display: block;
            width: 10%;
            padding-top: 10px;
        }

        .highlight-text {
            color: #ec1c24;
        }

        .hightlight-contact-info {
            font-weight: 700;
            font-size: 22px;
            line-height: 1.5;
        }

        .highlight-text-grey {
            font-weight: 500;
        }

        .email-info {
            margin-top: 20px;
        }

        ::-webkit-input-placeholder {
            /* Chrome */
            font-family: 'Roboto', sans-serif;
        }

        .required-input {
            color: black;
        }

        @media (min-width: 600px) {
            .contain {
                padding: 0;
            }
        }

        h3,
        ul {
            margin: 0;
        }

        h3 {
            margin-bottom: 1rem;
        }

        .form-input:focus,
        textarea:focus {
            outline: 1.5px solid #045773;
        }

        .form-input,
        textarea {
            width: 100%;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
        }

        .wrapper>* {
            padding: 1em;
        }

        @media (min-width: 700px) {
            .wrapper {
                display: grid;
                grid-template-columns: 2fr 1fr;
            }

            .wrapper>* {
                padding: 2em 2em;
            }
        }

        ul {
            list-style: none;
            padding: 0;
        }

        .contacts {
            color: #212d31;
        }

        .form {
            background: transparent;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }

        form label {
            display: block;
        }

        form p {
            margin: 0;
        }

        .full-width {
            grid-column: 1 / 3;
        }

        button,
        .submit-btn,
        .form-input,
        textarea {
            padding: 1em;
        }

        button,
        .submit-btn {
            background: transparent;
            border: 1px solid #045773;
            color: #0990b6;
            border-radius: 15px;
            padding: 5px 20px;
            text-transform: uppercase;
        }

        button:hover,
        .submit-btn:hover,
        button:focus,
        .submit-btn:focus {
            background: #045773;
            outline: 0;
            color: #eee;
        }

        .error {
            color: #045773;
        }
    </style>
@endpush
@section('content')
    <div class="contain">

        <div class="wrapper">

            <div class="form" style="color: #045773">
                <h4>GET IN TOUCH</h4>
                <h2 class="form-headline">Send us a message</h2>
                <form id="submit-form" action="">
                    <p>
                        <input id="name" class="form-input" style="border: 1px solid #045773" type="text" placeholder="Your Name*">
                        <small class="name-error"></small>
                    </p>
                    <p>
                        <input id="email" class="form-input" type="email" style="border: 1px solid #045773" required placeholder="Your Email*">
                        <small class="name-error"></small>
                    </p>
                    <p class="full-width">
                        <input id="company-name" class="form-input" style="border: 1px solid #045773" type="text" placeholder="Subject*" required>
                        <small></small>
                    </p>
                    <p class="full-width">
                        <textarea minlength="20" style="background:transparent;border:1px solid #045773" id="message" cols="30" rows="7" placeholder="Your Message*" required></textarea>
                        <small></small>
                    </p>
                   
                    <p class="full-width">
                        <input type="submit" class="submit-btn" value="Submit" onclick="checkValidations()">
                    </p>
                </form>
            </div>

            <div class="contacts contact-wrapper">

                <ul style="color: #045773">
                    <li>We've driven online revenues of over <span class="highlight-text-grey">$2
                            billion</span> for our clients. Ready to know
                        how we can help you?</li>
                    <span class="hightlight-contact-info">
                        <li class="email-info"><i class="fa fa-envelope" aria-hidden="true"></i> info@demo.com</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> <span class="highlight-text">+91 11 1111
                                2900</span></li>
                    </span>
                </ul>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
        const nameEl = document.querySelector("#name");
        const emailEl = document.querySelector("#email");
        const companyNameEl = document.querySelector("#company-name");
        const messageEl = document.querySelector("#message");

        const form = document.querySelector("#submit-form");

        function checkValidations() {
            let letters = /^[a-zA-Z\s]*$/;
            const name = nameEl.value.trim();
            const email = emailEl.value.trim();
            const companyName = companyNameEl.value.trim();
            const message = messageEl.value.trim();
            if (name === "") {
                document.querySelector(".name-error").classList.add("error");
                document.querySelector(".name-error").innerText =
                    "Please fill out this field!";
            } else {
                if (!letters.test(name)) {
                    document.querySelector(".name-error").classList.add("error");
                    document.querySelector(".name-error").innerText =
                        "Please enter only characters!";
                } else {

                }
            }
            if (email === "") {
                document.querySelector(".name-error").classList.add("error");
                document.querySelector(".name-error").innerText =
                    "Please fill out this field!";
            } else {
                if (!letters.test(name)) {
                    document.querySelector(".name-error").classList.add("error");
                    document.querySelector(".name-error").innerText =
                        "Please enter only characters!";
                } else {

                }
            }
        }

    </script>
@endpush
