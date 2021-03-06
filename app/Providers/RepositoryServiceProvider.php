<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\RoleRepository::class,                           \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ZoneRepository::class,                           \App\Repositories\ZoneRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class,                           \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccurrenceTypeRepository::class,                 \App\Repositories\OccurrenceTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccurrenceReportRepository::class,               \App\Repositories\OccurrenceReportRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccurrenceObjectRepository::class,               \App\Repositories\OccurrenceObjectRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\InvolvedPersonRepository::class,                 \App\Repositories\InvolvedPersonRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AuditLogRepository::class,                       \App\Repositories\AuditLogRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AttachmentsRepository::class,                    \App\Repositories\AttachmentsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\IrregularityTypesRepository::class,              \App\Repositories\IrregularityTypesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\IrregularityReportRepository::class,             \App\Repositories\IrregularityReportRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CoordinateRepository::class,                     \App\Repositories\CoordinateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EmergencyRepository::class,                      \App\Repositories\EmergencyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PositionEmergencyRepository::class,              \App\Repositories\PositionEmergencyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PasswordRecoveryRepository::class,               \App\Repositories\PasswordRecoveryRepositoryEloquent::class);
        //:end-bindings:
    }
}
