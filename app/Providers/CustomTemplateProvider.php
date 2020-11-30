<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CustomTemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('hello', function ($expression) {
            return "<?php echo 'Hello ' . {$expression}; ?>";
        });

        Blade::directive('form_field', function ($arguments) {
            $args = explode(",", $arguments);
            for ($i = 0; $i < sizeof($args); $i++){ 
                $args[$i] = trim($args[$i], "\'\"");
            }
            $text = "<div>";
            $text .= "<label for='".$args[1]."'>".$args[2]."</label>";
            $text .= "<input type='".$args[0]."' id='".$args[1]."' name='".$args[1]."' value=\"{{isset(\$eqp) ? \$eqp->tipo : old('tipo')}}\" {{\$form_mode == 'delete' ? 'disabled' : ''}}>";
            $text .= "@error('tipo') <div class='alert alert-danger'>{{ \$message }}</div> @enderror";
            $text .= "</div>";
            return $text;
        });
    }
}
