# Eventos

Conseguimos estructurar y aislar tareas a costa de una capa mayor de complejidad.

Si en `PaymentsController/store` tenemos que realizar las siguientes tareas

Principal:
 - procesar el pago
 - desbloquear la compra

Secundarias:
 - notificar al usuario sobre la compra
 - logro de premios
 - mandar cupón

y no deseamos usar una clase service o múltiples métodos, podemos usar los eventos.

Este procedimiento esta compuesto de **events** y **listeners**

```sh
# Crear eventos (sobra codigo si no necesitamos Broadcasting)
php artisan make:event ProductPurchased

# Crear listeners (habria que añadir el ProductPurchased en el handler)
php artisan make:listener AwardAchivements

# Sin necesidad de añadirnada manualmente
php artisan make:listener AwardAchivements -e ProductPurchased
php artisan make:listener SendShareableCoupon -e ProductPurchased
```

Los relacionamos entre si en el `app/Providers/EventServiceProvider.php`. Si no deseamos hacerlo manualmente podemos añadir el método
```php
public function shouldDiscoverEvents()
{
    return true;
}
```

Lista todos los eventos de la aplicación
```sh
php artisan event:list
```
