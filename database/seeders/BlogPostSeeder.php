<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first user (or create one if none exists)
        $author = User::first();

        // Get categories
        $theologyId = BlogCategory::where('slug', 'theology')->first()?->id;
        $christianLivingId = BlogCategory::where('slug', 'christian-living')->first()?->id;
        $bibleStudyId = BlogCategory::where('slug', 'bible-study')->first()?->id;
        $apologeticsId = BlogCategory::where('slug', 'apologetics')->first()?->id;
        $prayerId = BlogCategory::where('slug', 'prayer-devotion')->first()?->id;

        $posts = [
            // Theology Posts
            [
                'blog_category_id' => $theologyId,
                'author_id' => $author?->id,
                'title' => 'Understanding the Trinity: A Biblical 
Perspective',
                'slug' => 'understanding-the-trinity',
                'excerpt' => 'The doctrine of the Trinity is central to 
Christian theology. Learn how Scripture reveals God as three persons in one 
divine essence.',
                'content' => '<p>The Trinity is one of the most profound and 
essential doctrines of the Christian faith. It teaches that there is one God 
who exists eternally in three distinct persons: the Father, the Son, and the 
Holy Spirit.</p>
                
                <h2>Biblical Foundation</h2>
                <p>From Genesis to Revelation, Scripture reveals the triune 
nature of God. In Genesis 1:26, God says, "Let us make man in our image," 
hinting at plurality within the Godhead. The Great Commission in Matthew 28:19
explicitly mentions all three persons: "baptizing them in the name of the 
Father and of the Son and of the Holy Spirit."</p>
                
                <h2>Practical Implications</h2>
                <p>Understanding the Trinity affects how we pray, worship, and
relate to God. We pray to the Father, through the Son, in the power of the 
Holy Spirit. Each person of the Trinity plays a distinct role in our salvation
and sanctification.</p>
                
                <h2>Common Misconceptions</h2>
                <p>The Trinity is not three gods (tritheism), nor is it one 
person appearing in three modes (modalism). Rather, it is one God in three 
coequal, coeternal persons.</p>',
                'is_outstanding' => true,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(5),
                'views_count' => 1250,
                'order' => 1,
            ],
            [
                'blog_category_id' => $theologyId,
                'author_id' => $author?->id,
                'title' => 'Justification by Faith Alone: Martin Luther\'s 
Rediscovery',
                'slug' => 'justification-by-faith-alone',
                'excerpt' => 'Explore the biblical doctrine that sparked the 
Reformation and transformed Christianity forever.',
                'content' => '<p>The doctrine of justification by faith alone 
(sola fide) was the central issue of the Protestant Reformation. Martin 
Luther\'s study of Romans 1:17 led him to understand that we are declared 
righteous before God by faith alone, not by works.</p>
                
                <h2>The Biblical Basis</h2>
                <p>Romans 3:28 clearly states: "For we hold that one is 
justified by faith apart from works of the law." This truth is echoed 
throughout Paul\'s epistles and finds its roots in the Old Testament as 
well.</p>
                
                <h2>Why This Matters Today</h2>
                <p>Understanding justification by faith protects us from 
legalism on one hand and lawlessness on the other. It assures us that our 
salvation rests on Christ\'s finished work, not our imperfect efforts.</p>',
                'is_outstanding' => false,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(12),
                'views_count' => 890,
                'order' => 2,
            ],

            // Christian Living Posts
            [
                'blog_category_id' => $christianLivingId,
                'author_id' => $author?->id,
                'title' => 'How to Overcome Anxiety Through Prayer',
                'slug' => 'overcome-anxiety-through-prayer',
                'excerpt' => 'Practical steps to finding peace in God when 
worry threatens to overwhelm you.',
                'content' => '<p>Anxiety is a common struggle for many 
believers, but Scripture offers powerful remedies. Philippians 4:6-7 gives us 
a clear prescription: "Do not be anxious about anything, but in everything by 
prayer and supplication with thanksgiving let your requests be made known to 
God."</p>
                
                <h2>Five Practical Steps</h2>
                <ol>
                    <li><strong>Name your anxiety</strong> - Be specific about
what\'s troubling you</li>
                    <li><strong>Bring it to God</strong> - Don\'t try to 
handle it alone</li>
                    <li><strong>Give thanks</strong> - Remember God\'s past 
faithfulness</li>
                    <li><strong>Trust His sovereignty</strong> - God is in 
control</li>
                    <li><strong>Meditate on truth</strong> - Fill your mind 
with Scripture, not worry</li>
                </ol>
                
                <h2>The Promise of Peace</h2>
                <p>When we follow this pattern, God promises that "the peace 
of God, which surpasses all understanding, will guard your hearts and your 
minds in Christ Jesus."</p>',
                'is_outstanding' => true,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(3),
                'views_count' => 2100,
                'order' => 1,
            ],
            [
                'blog_category_id' => $christianLivingId,
                'author_id' => $author?->id,
                'title' => 'Building a Consistent Quiet Time Habit',
                'slug' => 'building-quiet-time-habit',
                'excerpt' => 'Struggling with daily Bible reading and prayer? 
Here\'s how to develop a sustainable devotional life.',
                'content' => '<p>Many Christians struggle with consistency in 
their quiet time. Here are practical strategies to help you establish and 
maintain this vital spiritual discipline.</p>
                
                <h2>Start Small</h2>
                <p>Don\'t try to read five chapters and pray for an hour on 
day one. Start with 10 minutes and build from there. Consistency beats 
intensity every time.</p>
                
                <h2>Same Time, Same Place</h2>
                <p>Choose a specific time and location. This removes decision 
fatigue and builds the habit more quickly.</p>
                
                <h2>Use a Plan</h2>
                <p>Reading plans and prayer guides can provide structure and 
prevent aimless wandering through Scripture.</p>',
                'is_outstanding' => false,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(8),
                'views_count' => 670,
                'order' => 2,
            ],

            // Bible Study Posts
            [
                'blog_category_id' => $bibleStudyId,
                'author_id' => $author?->id,
                'title' => 'The Book of Romans: A Comprehensive Overview',
                'slug' => 'book-of-romans-overview',
                'excerpt' => 'Romans is considered the most systematic 
presentation of Christian doctrine. Discover its major themes and structure.',
                'content' => '<p>The Epistle to the Romans stands as Paul\'s 
magnum opus, presenting the gospel in its fullest form. Written around AD 57, 
this letter has shaped Christian theology for nearly two millennia.</p>
                
                <h2>Structure of Romans</h2>
                <ul>
                    <li>Chapters 1-3: Universal sinfulness</li>
                    <li>Chapters 4-5: Justification by faith</li>
                    <li>Chapters 6-8: Sanctification and assurance</li>
                    <li>Chapters 9-11: Israel and God\'s plan</li>
                    <li>Chapters 12-16: Practical Christian living</li>
                </ul>
                
                <h2>Key Themes</h2>
                <p>Romans emphasizes God\'s righteousness, human sinfulness, 
justification by faith, the role of the Law, and the believer\'s new life in 
Christ.</p>',
                'is_outstanding' => true,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(1),
                'views_count' => 1540,
                'order' => 1,
            ],

            // Apologetics Posts
            [
                'blog_category_id' => $apologeticsId,
                'author_id' => $author?->id,
                'title' => 'Did Jesus Really Rise from the Dead? Examining the
Evidence',
                'slug' => 'jesus-resurrection-evidence',
                'excerpt' => 'The resurrection of Jesus is the cornerstone of 
Christian faith. What historical evidence supports this claim?',
                'content' => '<p>The resurrection of Jesus Christ is not just 
a matter of faith—it\'s a historical claim that can be examined with the tools
of historical investigation.</p>
                
                <h2>Historical Facts</h2>
                <p>Even critical scholars generally accept these facts:</p>
                <ol>
                    <li>Jesus died by crucifixion</li>
                    <li>His disciples believed they saw Him risen</li>
                    <li>Paul, a persecutor, converted suddenly</li>
                    <li>James, Jesus\' skeptical brother, converted</li>
                    <li>The tomb was found empty</li>
                </ol>
                
                <h2>Alternative Theories Fall Short</h2>
                <p>Various naturalistic explanations have been proposed—swoon 
theory, hallucination theory, stolen body theory—but each fails to account for
all the historical data.</p>',
                'is_outstanding' => false,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(15),
                'views_count' => 980,
                'order' => 1,
            ],

            // Prayer & Devotion Posts
            [
                'blog_category_id' => $prayerId,
                'author_id' => $author?->id,
                'title' => 'The Lord\'s Prayer: A Pattern for Our Prayers',
                'slug' => 'lords-prayer-pattern',
                'excerpt' => 'When the disciples asked Jesus how to pray, He 
gave them a model that continues to guide believers today.',
                'content' => '<p>The Lord\'s Prayer (Matthew 6:9-13) is not 
just a prayer to recite, but a pattern to follow in our personal prayer 
life.</p>
                
                <h2>The Structure</h2>
                <ul>
                    <li><strong>"Our Father"</strong> - Relationship and 
intimacy</li>
                    <li><strong>"Hallowed be Your name"</strong> - 
Worship</li>
                    <li><strong>"Your kingdom come"</strong> - God\'s 
purposes</li>
                    <li><strong>"Give us this day"</strong> - Daily 
provision</li>
                    <li><strong>"Forgive us"</strong> - Confession and 
repentance</li>
                    <li><strong>"Lead us not into temptation"</strong> - 
Spiritual protection</li>
                </ul>
                
                <h2>Application</h2>
                <p>This prayer teaches us to begin with God (worship) before 
moving to our needs (petition), and to remember both our dependence on Him and
our relationships with others.</p>',
                'is_outstanding' => false,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->subDays(20),
                'views_count' => 720,
                'order' => 1,
            ],

            // Draft Post (for testing)
            [
                'blog_category_id' => $theologyId,
                'author_id' => $author?->id,
                'title' => 'Understanding Predestination and Free Will 
(Draft)',
                'slug' => 'predestination-free-will-draft',
                'excerpt' => 'This is a draft post exploring the relationship 
between God\'s sovereignty and human responsibility.',
                'content' => '<p>This post is still being written...</p>',
                'is_outstanding' => false,
                'is_draft' => true,  // DRAFT!
                'is_active' => true,
                'published_at' => null,
                'views_count' => 0,
                'order' => 99,
            ],

            // Scheduled Post (for future publishing)
            [
                'blog_category_id' => $christianLivingId,
                'author_id' => $author?->id,
                'title' => 'New Year Spiritual Goals: Setting Biblical 
Priorities',
                'slug' => 'spiritual-goals-new-year',
                'excerpt' => 'As we enter a new year, how can we set goals 
that honor God and grow our faith?',
                'content' => '<p>This post is scheduled for future 
publishing...</p>',
                'is_outstanding' => false,
                'is_draft' => false,
                'is_active' => true,
                'published_at' => now()->addDays(7),  // FUTURE DATE!
                'views_count' => 0,
                'order' => 1,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }

        $this->command->info('✅ Created ' . count($posts) . ' blog posts 
successfully!');
        $this->command->info('   - Published: ' .
collect($posts)->where('is_draft', false)->where('published_at', '<=',
now())->count());
        $this->command->info('   - Drafts: ' .
collect($posts)->where('is_draft', true)->count());
        $this->command->info('   - Scheduled: ' .
collect($posts)->where('published_at', '>', now())->count());
        $this->command->info('   - Featured: ' .
collect($posts)->where('is_outstanding', true)->count());
    }
}