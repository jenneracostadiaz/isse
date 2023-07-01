<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
        ¡Bienvenido a ISSE, tu sistema integral de gestión de proyectos y facturas!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        En ISSE, entendemos lo importante que es para tu negocio tener un control preciso y eficiente de tus proyectos y facturación. Es por eso que hemos creado una herramienta diseñada específicamente para ayudarte a optimizar tus procesos y mejorar la productividad de tu equipo.
    </p>
</div>

<h2 class="p-6 lg:p-8 text-2xl text-gray-900 dark:text-white">Empresas a las que perteneces</h2>
<div class="px-6 lg:px-8 flex gap-4">
    @foreach ($companies as $company)
        <p class="group text-white bg-green-950 border border-green-500  p-2">
            {{ $company->name }}
        </p>
    @endforeach
</div>

<h2 class="mt-8 px-6 lg:px-8 text-2xl text-gray-900 dark:text-white">Proyectos</h2>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
    @foreach ($projects as $project)
        <x-card-project :project="$project" />
    @endforeach
</div>

<div class="p-6 lg:p-8 bg-white dark:bg-gray-800">
    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed text-xs">
        Estamos encantados de tenerte a bordo y esperamos que disfrutes de todas las ventajas que ISSE tiene para ofrecerte. No dudes en explorar todas nuestras funcionalidades y no dudes en contactarnos si tienes alguna pregunta o necesitas soporte. ¡Bienvenido a ISSE, tu aliado en la gestión de proyectos y facturación!
    </p>
</div>