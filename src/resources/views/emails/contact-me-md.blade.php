@component('mail::message')
# A Heading

Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit maxime obcaecati reprehenderit eius quia sed corrupti fugit perferendis, est laudantium quisquam et nostrum? Vel deserunt soluta rem nulla tempora voluptatem.

- A list
- Goes
- Here

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita libero magni odit officiis dolorem debitis placeat. Porro architecto distinctio, reprehenderit ratione voluptatibus atque dolorum numquam, itaque est, incidunt obcaecati necessitatibus.

@component('mail::button', ['url' => 'https://laracasts.com'])
Visit laracast
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
