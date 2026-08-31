<?php
require __DIR__ . "/vendor/autoload.php";
$app = require_once __DIR__ . "/bootstrap/app.php";
$app->make("Illuminate\Contracts\Console\Kernel")->bootstrap();

use App\Models\Facility;

echo "Total Facility: " . Facility::count() . "\n";
echo "is_active=1: " . Facility::where("is_active", 1)->count() . "\n";
echo "is_active=0: " . Facility::where("is_active", 0)->count() . "\n\n";
echo str_repeat("-", 110) . "\n";
Facility::select("id","name","category","is_active","image","schedule")->orderBy("id")->get()->each(function($r){
    echo sprintf("%2d) [aktif=%s] %-32s | cat=%-18s | img=%s | sch=%s\n",
        $r->id,
        $r->is_active ? "YES" : "NO ",
        $r->name,
        $r->category ?? "-",
        $r->image ? "YES (".substr($r->image,0,30).")" : "NONE",
        $r->schedule ? substr($r->schedule,0,40) : "-"
    );
});
echo str_repeat("-", 110) . "\n";
