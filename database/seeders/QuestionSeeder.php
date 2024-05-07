<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        // Level 1 - Must
$a = new Question();
$a->question_en = "Does the service explicitly focus on improving the wellbeing of people in Wales, considering both current and future generations?";
$a->question_cym = "A yw'r gwasanaeth yn canolbwyntio'n benodol ar wella llesiant pobl Cymru, gan ystyried cenedlaethau'r presennol a'r dyfodol?";
$a->level = 1;
$a->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$a->assessment()->associate(\App\Models\Assessment::find(1));
$a->save();

$b = new Question();
$b->question_en = "Does the service align with and contribute to the 7 wellbeing goals of Wales as outlined by the Well-being of Future Generations Act?";
$b->question_cym = "A yw'r gwasanaeth yn cyd-fynd â chyfrifoldebau llesiant Cymru ac yn cyfrannu at 7 nod llesiant Cymru fel y nodwyd gan Ddeddf Llesiant Cenedlaethau'r Dyfodol?";
$b->level = 1;
$b->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$b->assessment()->associate(\App\Models\Assessment::find(1));
$b->save();

$c = new Question();
$c->question_en = "Is the service designed to address the social, economic, environmental, and cultural aspects of wellbeing in Wales?";
$c->question_cym = "A yw'r gwasanaeth wedi'i gynllunio i fynd i'r afael â'r agweddau cymdeithasol, economaidd, amgylcheddol, a diwylliannol ar lesiant yng Nghymru?";
$c->level = 1;
$c->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$c->assessment()->associate(\App\Models\Assessment::find(1));
$c->save();

// Level 2 - Should
$d = new Question();
$d->question_en = "Has the service been developed with consideration of the broader impact it may have on the future generations of Wales?";
$d->question_cym = "A yw'r gwasanaeth wedi'i ddatblygu gan ystyried yr effaith ehangach y gallai gael ar genedlaethau'r dyfodol yng Nghymru?";
$d->level = 2;
$d->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$d->assessment()->associate(\App\Models\Assessment::find(1));
$d->save();

$e = new Question();
$e->question_en = "Does the service incorporate the principles outlined in the Framework for Future Generations when designing or planning changes?";
$e->question_cym = "A yw'r gwasanaeth yn cynnwys y egwyddorion a nodwyd yn y Fframwaith ar gyfer Cenedlaethau'r Dyfodol wrth gynllunio neu gynllunio newidiadau?";
$e->level = 2;
$e->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$e->assessment()->associate(\App\Models\Assessment::find(1));
$e->save();

$f = new Question();
$f->question_en = "Are the outcomes driven by the service more important than mere compliance with technical requirements?";
$f->question_cym = "A yw'r canlyniadau a ysgogir gan y gwasanaeth yn fwy pwysig na dim ond cydymffurfio â gofynion technegol?";
$f->level = 2;
$f->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$f->assessment()->associate(\App\Models\Assessment::find(1));
$f->save();

// Level 3 - Could
$g = new Question();
$g->question_en = "Has the service undergone an evaluation to assess its effectiveness in improving the overall wellbeing of people in Wales?";
$g->question_cym = "A yw'r gwasanaeth wedi cael ei werthuso i asesu ei effeithiolrwydd wrth wella llesiant cyffredinol pobl yng Nghymru?";
$g->level = 3;
$g->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$g->assessment()->associate(\App\Models\Assessment::find(1));
$g->save();

$h = new Question();
$h->question_en = "Are there mechanisms in place to adapt the service to changing needs and priorities of the Welsh Government and its citizens?";
$h->question_cym = "A oes mecanweithiau ar waith i addasu'r gwasanaeth i newidiadau yn anghenion a blaenoriaethau newydd Llywodraeth Cymru a'i dinasyddion?";
$h->level = 3;
$h->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$h->assessment()->associate(\App\Models\Assessment::find(1));
$h->save();

$i = new Question();
$i->question_en = "Does the service actively engage with stakeholders and communities to ensure their needs and perspectives are considered in its delivery?";
$i->question_cym = "A yw'r gwasanaeth yn ymgysylltu'n weithredol â rhanddeiliaid a chymunedau i sicrhau bod eu hanghenion a'u safbwyntiau yn cael eu hystyried yn ei ddarpariaeth?";
$i->level = 3;
$i->assessmentSection()->associate(\App\Models\AssessmentSection::find(1));
$i->assessment()->associate(\App\Models\Assessment::find(1));
$i->save();
    }

}
