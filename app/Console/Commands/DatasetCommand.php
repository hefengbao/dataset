<?php

namespace App\Console\Commands;

use App\Models\ChineseAntitheticalCouplet;
use App\Models\ChineseCharacter;
use App\Models\ChineseExpression;
use App\Models\ChineseKnowledge;
use App\Models\ChineseWisecrack;
use App\Models\Dataset;
use App\Models\Expression;
use App\Models\ChineseIdiom;
use App\Models\ChineseLyric;
use App\Models\ChineseModernPoetry;
use App\Models\ClassicalLiteraturePeople;
use App\Models\ClassicalLiteratureClassicPoem;
use App\Models\ClassicalLiteratureSentence;
use App\Models\ChineseProverb;
use App\Models\ChineseQuote;
use App\Models\ChineseRiddle;
use App\Models\ChineseTongueTwister;
use App\Models\ChinaWorldCulturalHeritage;
use App\Models\ClassicalLiteratureWriting;
use Illuminate\Console\Command;

class DatasetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dataset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'dataset 生成更新';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Dataset::updateOrCreate(
            ['version' => 3, 'count' => ClassicalLiteratureClassicPoem::count()],
            ['name' => 'classicalliterature_classicpoem']
        );
        Dataset::updateOrCreate(
            ['version' => 3, 'count' => ClassicalLiteratureWriting::count()],
            ['name' => 'classicalliterature_writing']
        );
        Dataset::updateOrCreate(
            ['version' => 3, 'count' => ClassicalLiteratureSentence::count()],
            ['name' => 'classicalliterature_sentence']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ClassicalLiteraturePeople::count()],
            ['name' => 'classicalliterature_people']
        );
        Dataset::updateOrCreate(
            ['version' => 3, 'count' => ChineseCharacter::count()],
            ['name' => 'chinese_character']
        );
        Dataset::updateOrCreate(
            ['version' => 4, 'count' => ChineseExpression::count()],
            ['name' => 'chinese_expression']
        );
        Dataset::updateOrCreate(
            ['version' => 5, 'count' => ChineseIdiom::count()],
            ['name' => 'chinese_idiom']
        );
        Dataset::updateOrCreate(
            ['version' => 4, 'count' => ChineseWisecrack::count()],
            ['name' => 'chinese_wisecrack']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseRiddle::count()],
            ['name' => 'chinese_riddle']
        );
        Dataset::updateOrCreate(
            ['version' => 3, 'count' => ChineseProverb::count()],
            ['name' => 'chinese_proverb']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseTongueTwister::count()],
            ['name' => 'chinese_tonguetwister']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseAntitheticalCouplet::count()],
            ['name' => 'chinese_antitheticalcouplet']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseLyric::count()],
            ['name' => 'chinese_lyric']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseKnowledge::count()],
            ['name' => 'chinese_knowledge']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseQuote::count()],
            ['name' => 'chinese_quote']
        );
        Dataset::updateOrCreate(
            ['version' => 2, 'count' => ChineseModernPoetry::count()],
            ['name' => 'chinese_modernpoetry']
        );

        Dataset::updateOrCreate(
            ['version' => 3, 'count' => ChinaWorldCulturalHeritage::count()],
            ['name' => 'china_worldcultureheritage']
        );
    }
}
