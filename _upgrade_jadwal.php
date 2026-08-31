<?php
$path = __DIR__ . "/resources/views/frontend/jadwal.blade.php";
$content = file_get_contents($path);

// ---------------- 1) BERSIHKAN ```blade WRAPPER di AWAL & AKHIR ----------------
$content = preg_replace('/^\s*```blade\s*/iu', '', $content, 1, $count1);
$content = preg_replace('/\s*```\s*$/u', '', $content, 1, $count2);
echo "[CLEAN] Removed ```blade wrapper: start=$count1 end=$count2\n";

// ---------------- 2) CSS BARU (PREMIUM) ----------------
$newCss = <<<'CSSBLOCK'
<style>
    /* =====================================================
       JADWAL PAGE - PREMIUM EDITION ✨
       Konsisten card kegiatan & potensi (gradient border via mask-composite, glassmorphism, hover lift)
    ===================================================== */
    .jadwal-page { background: linear-gradient(180deg, #f8fafc 0%, #f0fdf4 100%); }

    /* HERO PREMIUM */
    .jadwal-hero {
        position: relative; overflow: hidden;
        padding: 75px 0 70px;
        background:
            radial-gradient(circle at 20% 20%, rgba(16, 185, 129, 0.32) 0%, transparent 45%),
            radial-gradient(circle at 85% 80%, rgba(59, 130, 246, 0.18) 0%, transparent 50%),
            linear-gradient(135deg, #064e3b 0%, #047857 55%, #059669 100%);
        color: #fff;
    }
    .jadwal-hero::before { content:""; position:absolute; width:480px; height:480px; border-radius:50%; background:rgba(255,255,255,.05); top:-260px; right:-120px; }
    .jadwal-hero::after  { content:""; position:absolute; width:320px; height:320px; border-radius:50%; background:rgba(255,255,255,.038); bottom:-220px; left:-120px; }
    .jadwal-hero .wrap-container { position: relative; z-index: 2; }
    .jadwal-crumb { display:flex; align-items:center; gap:10px; margin-bottom:22px; color:rgba(255,255,255,.72); font-size:.88rem; }
    .jadwal-crumb a { color:#fff; text-decoration:none; transition:.2s; display:inline-flex; align-items:center; }
    .jadwal-crumb a:hover { opacity:.78; transform: translateX(-2px); }
    .jadwal-crumb .active { color:#bbf7d0; font-weight:600; }
    .jadwal-hero h1 {
        margin: 0 0 14px;
        font-size: clamp(2.1rem, 4.2vw, 3.2rem);
        line-height: 1.12; font-weight: 850; letter-spacing: -.9px;
        background: linear-gradient(90deg, #fff 0%, #bbf7d0 100%);
        -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
    }
    .jadwal-hero p { max-width: 680px; margin: 0; color: rgba(255,255,255,.84); font-size: 1.02rem; line-height: 1.82; }

    /* CONTENT WRAP */
    .jadwal-content { padding: 70px 0 90px; }
    .jadwal-intro { margin-bottom: 38px; }
    .jadwal-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        margin-bottom: 12px; padding: 8px 16px;
        border-radius: 999px;
        background: #ecfdf5; color: #047857;
        font-size: .72rem; font-weight: 850; letter-spacing: .4px; text-transform: uppercase;
        border: 1px solid #bbf7d0;
        box-shadow: 0 6px 18px rgba(16, 185, 129, 0.10);
    }
    .jadwal-title {
        margin: 0 0 10px;
        color: #0f172a;
        font-size: clamp(1.6rem, 2.7vw, 2.2rem);
        line-height: 1.22; font-weight: 850; letter-spacing: -.5px;
    }
    .jadwal-subtitle { margin: 0; color: #64748b; font-size: .96rem; line-height: 1.78; max-width: 620px; }

    /* GRID */
    .schedule-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 26px; }

    /* =====================================================
       CARD PREMIUM (KONSISTEN DENGAN CARD KEGIATAN / POTENSI)
       = Rounded 18, overflow hidden, shadow, hover lift -6px,
       = Gradient border via mask-composite (unique per hari)
    ===================================================== */
    .sch-card {
        position: relative; overflow: hidden;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        border: 1px solid rgba(226, 232, 240, 0.7);
        transition: transform .38s cubic-bezier(.4,0,.2,1),
                    box-shadow .38s cubic-bezier(.4,0,.2,1),
                    border-color .25s ease;
        isolation: isolate;
    }
    /* Gradient border (mask-composite trick) */
    .sch-card::before {
        content: ""; position: absolute; inset: 0; border-radius: inherit;
        padding: 1.2px;
        background: linear-gradient(135deg, var(--sch-grad-a, #10b981), var(--sch-grad-b, #3b82f6) 55%, var(--sch-grad-c, #ec4899));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor; mask-composite: exclude;
        pointer-events: none; opacity: 0; transition: opacity .35s ease; z-index: 2;
    }
    .sch-card:hover::before { opacity: 1; }
    .sch-card:hover {
        transform: translateY(-6px);
        border-color: transparent;
        box-shadow: 0 22px 50px rgba(15, 23, 42, 0.13);
    }

    /* KODE WARNA 7 HARI (gradient + chip color unik per hari) */
    .sch-card[data-day="Senin"]        { --sch-grad-a:#10b981; --sch-grad-b:#14b8a6; --sch-grad-c:#06b6d4; --sch-chip-bg:rgba(16,185,129,.18); --sch-chip-color:#047857; --sch-accent:#10b981; }
    .sch-card[data-day="Selasa"]       { --sch-grad-a:#f59e0b; --sch-grad-b:#f97316; --sch-grad-c:#ef4444; --sch-chip-bg:rgba(245,158,11,.18); --sch-chip-color:#b45309; --sch-accent:#f59e0b; }
    .sch-card[data-day="Rabu"]         { --sch-grad-a:#3b82f6; --sch-grad-b:#6366f1; --sch-grad-c:#8b5cf6; --sch-chip-bg:rgba(59,130,246,.18); --sch-chip-color:#1d4ed8; --sch-accent:#3b82f6; }
    .sch-card[data-day="Kamis"]        { --sch-grad-a:#ec4899; --sch-grad-b:#db2777; --sch-grad-c:#f472b6; --sch-chip-bg:rgba(236,72,153,.17); --sch-chip-color:#be185d; --sch-accent:#ec4899; }
    .sch-card[data-day="Jumat"]        { --sch-grad-a:#ef4444; --sch-grad-b:#f87171; --sch-grad-c:#fb7185; --sch-chip-bg:rgba(239,68,68,.17); --sch-chip-color:#b91c1c; --sch-accent:#ef4444; }
    .sch-card[data-day="Sabtu"]        { --sch-grad-a:#0ea5e9; --sch-grad-b:#06b6d4; --sch-grad-c:#14b8a6; --sch-chip-bg:rgba(14,165,233,.17); --sch-chip-color:#0369a1; --sch-accent:#0ea5e9; }
    .sch-card[data-day="Minggu"]       { --sch-grad-a:#8b5cf6; --sch-grad-b:#a855f7; --sch-grad-c:#d946ef; --sch-chip-bg:rgba(139,92,246,.17); --sch-chip-color:#6d28d9; --sch-accent:#8b5cf6; }
    .sch-card[data-day*="-"]           { --sch-grad-a:#059669; --sch-grad-b:#0891b2; --sch-grad-c:#7c3aed; --sch-chip-bg:rgba(5,150,105,.16); --sch-chip-color:#065f46; --sch-accent:#059669; }

    /* PHOTO / PLACEHOLDER PREMIUM (Full width TOP, aspect 16:9) */
    .sch-img, .sch-placeholder {
        position: relative;
        width: 100% !important; height: auto !important;
        aspect-ratio: 16 / 9;
        margin: 0 !important;
        overflow: hidden;
        border-radius: 0;
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    }
    .sch-img img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .65s cubic-bezier(.4,0,.2,1); }
    .sch-card:hover .sch-img img { transform: scale(1.07); }

    /* Overlay gelap bottom (bikin text chip glass keliatan jelas) */
    .sch-img::after, .sch-placeholder::after {
        content: ""; position: absolute; inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 45%, rgba(4,120,87,0.35) 100%);
        pointer-events: none; z-index: 1;
    }

    /* PLACEHOLDER icon center gradient */
    .sch-placeholder { color: #059669; display: flex; align-items: center; justify-content: center; position: relative; }
    .sch-placeholder i {
        font-size: 64px; opacity: .55; transform: translateY(-4px);
        filter: drop-shadow(0 6px 12px rgba(16, 185, 129, 0.20));
        position: relative; z-index: 2;
    }
    .sch-placeholder::before {
        content: ""; position: absolute; inset: 0;
        background:
            radial-gradient(circle at 30% 20%, rgba(255,255,255,.45) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(16,185,129,.18) 0%, transparent 55%);
        z-index: 0;
    }

    /* =====================================================
       CHIP HARI GLASS FLOAT (Kiri atas foto)
       = glassmorphism (backdrop-blur)
    ===================================================== */
    .chip-day-glass {
        position: absolute; top: 14px; left: 14px; z-index: 5;
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 13px;
        border-radius: 999px;
        background: var(--sch-chip-bg, rgba(16,185,129,.18));
        backdrop-filter: blur(8px) saturate(180%);
        -webkit-backdrop-filter: blur(8px) saturate(180%);
        color: var(--sch-chip-color, #047857);
        font-size: .72rem; font-weight: 850; letter-spacing: .25px;
        border: 1px solid rgba(255,255,255,.45);
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.10);
        text-transform: uppercase;
    }
    .chip-day-glass i { font-size: .7rem; opacity: .9; }

    /* BODY CARD PREMIUM */
    .sch-head { padding: 20px 22px 0 !important; margin-bottom: 14px; position: relative; }
    .sch-head .sch-day { display: none !important; } /* chip lama di-destroy (sudah pindah ke foto float glass) */

    .sch-name {
        margin: 0;
        color: #0f172a;
        font-size: 1.12rem; line-height: 1.4;
        font-weight: 800; letter-spacing: -.2px;
    }
    .sch-name::after {
        content: ""; display: block; margin-top: 12px;
        width: 34px; height: 3px; border-radius: 999px;
        background: linear-gradient(90deg, var(--sch-accent, #10b981), transparent);
        opacity: .85;
    }
    .sch-body { padding: 0 22px 22px !important; }

    /* Info row icons (jam + lokasi) */
    .sch-info-row { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 14px; }
    .sch-info-chip {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 7px 12px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #334155;
        font-size: .76rem; font-weight: 650; line-height: 1;
        transition: .2s;
    }
    .sch-card:hover .sch-info-chip {
        background: var(--sch-chip-bg, #ecfdf5);
        border-color: transparent;
        color: var(--sch-chip-color, #047857);
    }
    .sch-info-chip i { font-size: .74rem; opacity: .85; }

    .time-chip { all: unset; display: none !important; } /* hapus chip lama */

    .sch-desc {
        color: #64748b;
        font-size: .86rem; line-height: 1.78;
        display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
        margin: 0;
    }

    /* INFO BOX PREMIUM */
    .jadwal-info {
        position: relative; overflow: hidden;
        display: flex; align-items: flex-start; gap: 20px;
        margin-top: 50px; padding: 26px 28px;
        border-radius: 22px;
        background: linear-gradient(135deg, #eff6ff 0%, #f0fdf4 100%);
        border: 1px solid #bfdbfe;
        box-shadow: 0 14px 34px rgba(37, 99, 235, 0.08);
    }
    .jadwal-info::after {
        content: ""; position: absolute;
        width: 220px; height: 220px; border-radius: 50%;
        background: radial-gradient(circle, rgba(16,185,129,.12) 0%, transparent 70%);
        right: -90px; bottom: -130px;
    }
    .jadwal-info::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px;
        background: linear-gradient(90deg, #2563eb, #10b981, #8b5cf6);
    }
    .jadwal-info-icon {
        position: relative; z-index: 2;
        flex: 0 0 54px; width: 54px; height: 54px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 16px;
        background: linear-gradient(135deg, #fff 0%, #eff6ff 100%);
        color: #2563eb;
        font-size: 1.35rem;
        box-shadow: 0 8px 22px rgba(37,99,235,.12);
    }
    .jadwal-info-content { position: relative; z-index: 2; }
    .jadwal-info-title { margin: 2px 0 8px; color: #1d4ed8; font-size: .98rem; font-weight: 850; letter-spacing: -.2px; }
    .jadwal-info-text  { margin: 0; color: #475569; font-size: .86rem; line-height: 1.82; }

    /* EMPTY STATE PREMIUM */
    .jadwal-empty {
        grid-column: 1 / -1;
        padding: 65px 30px; text-align: center;
        background: #fff; border: 1px dashed #a7f3d0; border-radius: 24px;
        box-shadow: 0 12px 36px rgba(15,23,42,.05);
        position: relative; overflow: hidden;
    }
    .jadwal-empty::before {
        content: ""; position: absolute; inset: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(16,185,129,.07) 0%, transparent 45%),
            radial-gradient(circle at 80% 70%, rgba(59,130,246,.06) 0%, transparent 45%);
    }
    .jadwal-empty-icon {
        width: 78px; height: 78px;
        margin: 0 auto 22px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 22px;
        background: linear-gradient(135deg, #ecfdf5, #dbeafe);
        color: #059669;
        font-size: 1.95rem;
        box-shadow: 0 10px 25px rgba(16,185,129,.12);
        position: relative;
    }
    .jadwal-empty h5 { margin-bottom: 10px; color: #0f172a; font-weight: 800; font-size: 1.1rem; position: relative; }
    .jadwal-empty p  { max-width: 470px; margin: auto; color: #64748b; font-size: .9rem; line-height: 1.78; position: relative; }

    /* RESPONSIVE */
    @media (max-width: 991px) { .schedule-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; } }
    @media (max-width: 768px) {
        .jadwal-hero { padding: 52px 0 48px; }
        .jadwal-hero h1 { font-size: 2.1rem; }
        .jadwal-hero p { font-size: .94rem; }
        .jadwal-content { padding: 48px 0 68px; }
        .schedule-grid { gap: 18px; }
        .sch-info-row { gap: 10px; }
        .jadwal-info { margin-top: 38px; padding: 22px; gap: 15px; }
        .jadwal-info-icon { flex-basis: 48px; width: 48px; height: 48px; font-size: 1.15rem; }
    }
    @media (max-width: 575px) {
        .schedule-grid { grid-template-columns: 1fr; gap: 18px; }
        .sch-head { padding: 18px 19px 0 !important; }
        .sch-body { padding: 0 19px 20px !important; }
        .jadwal-intro { margin-bottom: 30px; }
        .jadwal-empty { padding: 55px 22px; }
    }
</style>
CSSBLOCK;

// 3) REPLACE BLOCK <style>
$stylePattern = '/<style[^>]*>.*?<\/style>/is';
$newContent = preg_replace($stylePattern, $newCss, $content, 1, $styleCount);
if ($styleCount === 0) {
    echo "[ERROR] Blok <style> tidak ditemukan\n";
    exit(1);
}
echo "[CSS] Replaced style block OK ($styleCount)\n";

// 4) REPLACE LOOP FOREACH CARD
$newCardHtml = <<<'HTMLCARD'
                @foreach($jadwal as $item)
                    @php
                        $imgValid = !empty($item->image) && $item->image !== "null" && trim($item->image) !== "";
                        $timeText = trim($item->time ?? ($item->start_time ? substr($item->start_time,0,5)."-".substr($item->end_time ?? "",0,5) : ""));
                        if (empty($timeText)) $timeText = "Lihat Pengumuman";
                        $locText = trim($item->location ?? "");
                        if (empty($locText)) $locText = "Dusun Jlegongan";
                        $iconMap = [
                            "pengajian" => "bi-moon-stars-fill",
                            "karang"  => "bi-people-fill",
                            "taruna"  => "bi-people-fill",
                            "posyandu"=> "bi-heart-pulse-fill",
                            "arisan"  => "bi-people-fill",
                            "gotong"  => "bi-houses-fill",
                            "royong"  => "bi-houses-fill",
                            "olahraga"=> "bi-trophy-fill",
                            "tpa"     => "bi-book-half",
                        ];
                        $actIcon = "bi-calendar-event-fill";
                        $nameLow = Str::lower($item->name ?? "");
                        foreach ($iconMap as $kw => $ic) { if (str_contains($nameLow, $kw)) { $actIcon = $ic; break; } }
                    @endphp

                    <div class="sch-card @if(!$imgValid) no-image @endif" data-day="{{ $item->day }}">

                        @if($imgValid)
                        <div class="sch-img">
                            <span class="chip-day-glass">
                                <i class="bi bi-calendar3"></i>
                                {{ $item->day }}
                            </span>
                            <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}"
                                 alt="{{ $item->name }}"
                                 loading="lazy"
                                 onerror="this.style.display='none'">
                        </div>
                        @else
                        <div class="sch-placeholder">
                            <span class="chip-day-glass">
                                <i class="bi bi-calendar3"></i>
                                {{ $item->day }}
                            </span>
                            <i class="bi {{ $actIcon }}"></i>
                        </div>
                        @endif

                        <div class="sch-head">
                            <h6 class="sch-name">
                                {{ $item->name }}
                            </h6>
                        </div>

                        <div class="sch-body">
                            <div class="sch-info-row">
                                <span class="sch-info-chip">
                                    <i class="bi bi-clock-fill"></i>
                                    {{ $timeText }}
                                </span>
                                <span class="sch-info-chip">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    {{ $locText }}
                                </span>
                            </div>

                            @if(trim($item->description ?? "") !== "" && $item->description !== "null")
                                <p class="sch-desc">
                                    {{ $item->description }}
                                </p>
                            @else
                                <p class="sch-desc">
                                    Kegiatan rutin masyarakat Dusun Jlegongan untuk meningkatkan kebersamaan dan kesejahteraan warga.
                                </p>
                            @endif
                        </div>

                    </div>
                @endforeach
HTMLCARD;

// Fallback strpos replace (paling aman tanpa regex whitespace)
$loopStart = strpos($newContent, "@foreach(\$jadwal as \$item)");
$loopEnd   = strpos($newContent, "@endforeach", $loopStart + 1);
if ($loopStart === false || $loopEnd === false) {
    echo "[ERROR] Tidak nemu loop @foreach jadwal\n";
    exit(1);
}
$before = substr($newContent, 0, $loopStart);
$after  = substr($newContent, $loopEnd + strlen("@endforeach"));
$newContent = $before . $newCardHtml . $after;
echo "[CARD] Loop card replaced OK (strpos)\n";

file_put_contents($path, $newContent);
$size = number_format(strlen($newContent));
echo "[DONE] jadwal.blade.php PREMIUM SAVED | size = $size bytes\n";
echo "--- CHECK COUNT: data-day=" . substr_count($newContent, 'data-day="{{') . " | chip-day-glass=" . substr_count($newContent, "chip-day-glass") . " | sch-info-row=" . substr_count($newContent, "sch-info-row") . "\n";
