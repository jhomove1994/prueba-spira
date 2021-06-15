<?php

namespace App\Supports;

class MessagesResponse
{
    const RESOURCE_CREATED = 'Se ha creado correctamente %s';
    const RESOURCE_UPDATED = 'Se ha actualizado correctamente %s';
    const RESOURCE_DELETED = 'Se ha eliminado correctamente %s';
    const RESOURCE_ASIGNED = 'Se ha asignado correctamente %s al %';
    const RESOURCE_DEALLOCATED = 'Se ha desasignado el curso correctamente';
    const RESOURCE_NOT_FOUND = 'No se ha encontrado %s';
    const GENERIC_ERROR = 'Ha ocurrido un error, comuniquese con el administrador';
    const INCORRECT_PASSWORD = 'Contrasena incorrecta';
}
