<?php

namespace BybitApi;

interface ActorSupplier
{
    public function actingAs(): BybitActor;
}
