<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentSection;


class AssessmentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new AssessmentSection();
        $a->name_en = "Focus on the current and future wellbeing of people in Wales";
        $a->name_cym = "Canolbwyntio ar lesiant pobl Cymru yn awr ac yn y dyfodol ";
        $a->description_en = "Service teams should be driven by outcomes that benefit the people of Wales, not by lists of technical requirements. You should consider future generations and think about the social, economic, environmental and cultural wellbeing of Wales. Services should contribute to the 7 wellbeing goals of Wales.";
        $a->description_cym = "Dylai timau gwasanaeth gael eu hysgogi gan ganlyniadau sydd o fudd i bobl Cymru, nid gan restrau o ofynion technegol. Dylech ystyried cenedlaethau’r dyfodol a meddwl am lesiant cymdeithasol, economaidd, amgylcheddol a diwylliannol Cymru. Dylai gwasanaethau gyfrannu at 7 nod llesiant Cymru.";
        $a->assessment()->associate(\App\Models\Assessment::find(1));
        $a->save();

        $a = new AssessmentSection();
        $a->name_en = "Design services in Welsh and English";
        $a->name_cym = "Dylunio gwasanaethau yn Gymraeg a Saesneg";
        $a->description_en = "Services in Wales must meet the needs of people who use the Welsh language in their everyday lives. You need to design and build services that promote and ease the use of Welsh and treat those who speak it equally with those who speak English.";
        $a->description_cym = "Mae’n rhaid i wasanaethau yng Nghymru fodloni anghenion pobl sy’n defnyddio’r Gymraeg yn eu bywydau pob dydd. Mae angen i chi ddylunio a chreu gwasanaethau sy’n hybu a hwyluso defnydd o’r Gymraeg ac yn trin pobl sy’n ei siarad yn gydradd â phobl sy’n siarad Saesneg.";
        $a->assessment()->associate(\App\Models\Assessment::find(1));
        $a->save();
    }
}
