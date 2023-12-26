<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Person;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        if (Schema::hasTable('people')) {
            $this->selected_person = Person::where('status',1)->first();
            $this->person_list = Person::get();

            $this->is_start = 0;

            if(isset($this->selected_person) && !empty($this->selected_person)){
               $date_now = date("Y-m-d H:i:s");
               if ($date_now >= $this->selected_person->start_date) {
                    $this->is_start = 1;
                }
            }

            view()->composer('*', function($view) {
                $view->with(['selected_person' => $this->selected_person, 'person_list' =>$this->person_list, 'is_start' => $this->is_start]);
            });
        }

    }
}
