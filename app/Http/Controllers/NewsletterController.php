<?php

    namespace App\Http\Controllers;

    use App\services\Newsletter;
    use Exception;
    use Illuminate\Validation\ValidationException;


    class NewsletterController extends Controller
    {
        public
        function __invoke(
            Newsletter $newsletter
        ){
            request()->validate([
                'email' => ['required', 'email']
            ]);


            try {
                $newsletter->subscribe(request('email'));
            } catch (Exception $e) {
                throw ValidationException::withMessages(['email' => 'This Email could not be added to our newsletter']);
            }
            return redirect("/")->with('success', 'You successfully subscribed');
        }
    }
