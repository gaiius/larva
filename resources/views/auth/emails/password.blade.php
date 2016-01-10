@lang('passwords.click_here_to_reset'): {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}
