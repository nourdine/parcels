<?php

namespace parcels;

interface Exportable {

   public function toArray();

   public function toJson();
}