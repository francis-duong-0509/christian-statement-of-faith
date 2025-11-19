<?php

namespace Database\Seeders;

use App\Models\FaithCategory;
use App\Models\FaithStatement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaithStatementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy categories (dùng slug để dễ reference)
        $trinity = FaithCategory::where('slug_en', 'the-trinity')->first();
        $scripture = FaithCategory::where('slug_en', 'holy-scripture')->first();
        $salvation = FaithCategory::where('slug_en', 'salvation')->first();
        $church = FaithCategory::where('slug_en', 'the-church')->first();
        $lastThings = FaithCategory::where('slug_en', 'last-things')->first();

        $statements = [
            // THE TRINITY - 2 statements
            [
                'faith_category_id' => $trinity->id,
                'title_vi' => 'Đức Chúa Trời là Ba Ngôi',
                'title_en' => 'God is Triune',
                'slug_vi' => 'duc-chua-troi-la-ba-ngoi',
                'slug_en' => 'god-is-triune',
                'content_vi' => '<p>Chúng ta tin rằng có một Đức Chúa Trời duy nhất,
  tồn tại đời đời trong ba ngôi riêng biệt nhưng đồng bản chất: Đức Chúa Cha, Đức Chúa
  Con, và Đức Thánh Linh. Ba ngôi này cùng tồn tại từ đời đời, đồng quyền, đồng vinh
  hiển.</p><p>Đức Chúa Cha là Đấng Tạo Hóa, Đức Chúa Con là Đấng Cứu Chuộc, và Đức
  Thánh Linh là Đấng An Ủi và Thánh Hóa.</p>',
                'content_en' => '<p>We believe that there is one God, eternally
  existing in three distinct but equal persons: God the Father, God the Son, and God
  the Holy Spirit. These three persons are co-eternal, co-equal in power and
  glory.</p><p>The Father is the Creator, the Son is the Redeemer, and the Holy Spirit
  is the Comforter and Sanctifier.</p>',
                'scripture_references' => ['Matthew 28:19', 'John 1:1', '2
  Corinthians 13:14', 'Genesis 1:26'],
                'order' => 1,
                'is_active' => true,
                'meta_title_vi' => 'Đức Chúa Trời là Ba Ngôi - Tuyên Bố Đức Tin',
                'meta_title_en' => 'God is Triune - Statement of Faith',
                'meta_description_vi' => 'Chúng ta tin vào một Đức Chúa Trời duy
  nhất, tồn tại đời đời trong ba ngôi: Cha, Con và Thánh Linh.',
                'meta_description_en' => 'We believe in one God, eternally existing
  in three persons: Father, Son, and Holy Spirit.',
            ],
            [
                'faith_category_id' => $trinity->id,
                'title_vi' => 'Chúa Giê-xu Christ là Đức Chúa Trời',
                'title_en' => 'Jesus Christ is God',
                'slug_vi' => 'chua-giesu-christ-la-duc-chua-troi',
                'slug_en' => 'jesus-christ-is-god',
                'content_vi' => '<p>Chúng ta tin rằng Chúa Giê-xu Christ là Đức Chúa
  Trời Con, Ngôi thứ hai của Ba Ngôi Thiên Chúa. Ngài là Đấng được sinh ra từ trước thế
   gian, đồng đẳng với Đức Chúa Cha.</p><p>Ngài đã trở nên người, sinh ra từ đồng trinh
   Ma-ri-a, sống một đời sống không tội lỗi, chết trên thập tự giá cho tội lỗi của
  chúng ta, sống lại từ kẻ chết, và lên trời ngồi bên hữu Đức Chúa Cha.</p>',
                'content_en' => '<p>We believe that Jesus Christ is God the Son, the
  second person of the Trinity. He is the eternally begotten of the Father, co-equal
  with God the Father.</p><p>He became man, born of the virgin Mary, lived a sinless
  life, died on the cross for our sins, rose from the dead, and ascended to heaven to
  sit at the right hand of the Father.</p>',
                'scripture_references' => ['John 1:1-14', 'Philippians 2:5-11',
                    'Colossians 1:15-20', 'Hebrews 1:1-3'],
                'order' => 2,
                'is_active' => true,
            ],

            // HOLY SCRIPTURE - 2 statements
            [
                'faith_category_id' => $scripture->id,
                'title_vi' => 'Kinh Thánh là Lời Chúa',
                'title_en' => 'The Bible is the Word of God',
                'slug_vi' => 'kinh-thanh-la-loi-chua',
                'slug_en' => 'the-bible-is-the-word-of-god',
                'content_vi' => '<p>Chúng ta tin rằng Kinh Thánh, bao gồm 66 sách từ
  Sáng Thế Ký đến Khải Huyền, là Lời Chúa được thần cảm. Đức Thánh Linh đã cảm động các
   tác giả để viết chính xác những gì Chúa muốn truyền đạt.</p><p>Kinh Thánh là hoàn
  toàn đáng tin cậy, không có lỗi lầm trong bản gốc, và là thẩm quyền cuối cùng trong
  mọi vấn đề về đức tin và đời sống Cơ Đốc.</p>',
                'content_en' => '<p>We believe that the Bible, consisting of 66 books
   from Genesis to Revelation, is the inspired Word of God. The Holy Spirit moved the
  authors to write exactly what God intended to communicate.</p><p>The Bible is
  completely trustworthy, without error in its original manuscripts, and is the final
  authority on all matters of faith and Christian living.</p>',
                'scripture_references' => ['2 Timothy 3:16-17', '2 Peter 1:20-21',
                    'Psalm 119:105', 'John 17:17'],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'faith_category_id' => $scripture->id,
                'title_vi' => 'Kinh Thánh là Thẩm Quyền Tối Cao',
                'title_en' => 'The Bible is the Final Authority',
                'slug_vi' => 'kinh-thanh-la-tham-quyen-toi-cao',
                'slug_en' => 'the-bible-is-the-final-authority',
                'content_vi' => '<p>Chúng ta tin rằng Kinh Thánh là thẩm quyền tối
  cao và cuối cùng cho mọi vấn đề về đức tin, giáo lý, và đạo đức. Không có truyền
  thống, kinh nghiệm, hay lý trí nào có thể vượt qua hoặc mâu thuẫn với Kinh
  Thánh.</p>',
                'content_en' => '<p>We believe that the Bible is the supreme and
  final authority for all matters of faith, doctrine, and morals. No tradition,
  experience, or reason can supersede or contradict Scripture.</p>',
                'scripture_references' => ['Isaiah 40:8', 'Matthew 5:18', 'Hebrews
  4:12', '1 Peter 1:23-25'],
                'order' => 2,
                'is_active' => true,
            ],

            // SALVATION - 2 statements
            [
                'faith_category_id' => $salvation->id,
                'title_vi' => 'Cứu Rỗi bởi Ân Điển qua Đức Tin',
                'title_en' => 'Salvation by Grace through Faith',
                'slug_vi' => 'cuu-roi-boi-an-dien-qua-duc-tin',
                'slug_en' => 'salvation-by-grace-through-faith',
                'content_vi' => '<p>Chúng ta tin rằng sự cứu rỗi là một món quà ân
  điển miễn phí từ Đức Chúa Trời, không thể kiếm được bởi việc làm hay công đức của con
   người. Sự cứu rỗi chỉ được nhận bởi đức tin nơi Chúa Giê-xu Christ.</p><p>Khi chúng
  ta tin nhận Chúa Giê-xu, chúng ta được xưng công chính, tội lỗi được tha thứ, và nhận
   được sự sống đời đời.</p>',
                'content_en' => '<p>We believe that salvation is a free gift of
  God\'s grace, not earned by works or human merit. Salvation is received by faith
  alone in Jesus Christ alone.</p><p>When we trust in Jesus, we are justified, our sins
   are forgiven, and we receive eternal life.</p>',
                'scripture_references' => ['Ephesians 2:8-9', 'Romans 3:23-24', 'John
   3:16', 'Acts 16:31'],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'faith_category_id' => $salvation->id,
                'title_vi' => 'Sự Tái Sinh và Thánh Hóa',
                'title_en' => 'Regeneration and Sanctification',
                'slug_vi' => 'su-tai-sinh-va-thanh-hoa',
                'slug_en' => 'regeneration-and-sanctification',
                'content_vi' => '<p>Chúng ta tin rằng khi một người tin nhận Chúa
  Giê-xu, họ được tái sinh bởi Đức Thánh Linh, trở thành một tạo vật mới. Quá trình
  thánh hóa bắt đầu, trong đó Đức Thánh Linh biến đổi người tin để giống Đấng Christ
  hơn.</p>',
                'content_en' => '<p>We believe that when a person trusts in Jesus,
  they are born again by the Holy Spirit, becoming a new creation. The process of
  sanctification begins, in which the Holy Spirit transforms the believer to become
  more like Christ.</p>',
                'scripture_references' => ['John 3:3-7', '2 Corinthians 5:17',
                    'Romans 8:29', '1 Thessalonians 5:23'],
                'order' => 2,
                'is_active' => true,
            ],

            // THE CHURCH - 2 statements
            [
                'faith_category_id' => $church->id,
                'title_vi' => 'Hội Thánh là Thân Thể Christ',
                'title_en' => 'The Church is the Body of Christ',
                'slug_vi' => 'hoi-thanh-la-than-the-christ',
                'slug_en' => 'the-church-is-the-body-of-christ',
                'content_vi' => '<p>Chúng ta tin rằng Hội Thánh là thân thể của Đấng
  Christ, bao gồm tất cả những người đã tin nhận Ngài là Cứu Chúa. Đấng Christ là Đầu
  của Hội Thánh, và mỗi tín đồ là một chi thể.</p><p>Hội Thánh được kêu gọi để thờ
  phượng Chúa, giảng dạy Lời Chúa, và làm chứng về Phúc Âm.</p>',
                'content_en' => '<p>We believe that the Church is the body of Christ,
   composed of all who have trusted in Him as Savior. Christ is the Head of the Church,
   and each believer is a member.</p><p>The Church is called to worship God, teach the
  Word, and bear witness to the Gospel.</p>',
                'scripture_references' => ['Ephesians 1:22-23', '1 Corinthians
  12:12-27', 'Colossians 1:18', 'Acts 2:42-47'],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'faith_category_id' => $church->id,
                'title_vi' => 'Các Nghi Lễ: Báp-têm và Tiệc Thánh',
                'title_en' => 'The Ordinances: Baptism and Lord\'s Supper',
                'slug_vi' => 'cac-nghi-le-baptem-va-tiec-thanh',
                'slug_en' => 'the-ordinances-baptism-and-lords-supper',
                'content_vi' => '<p>Chúng ta tin rằng Chúa Giê-xu đã thiết lập hai
  nghi lễ cho Hội Thánh: Báp-têm và Tiệc Thánh. Báp-têm là biểu tượng về sự chết, chôn
  và phục sinh với Đấng Christ. Tiệc Thánh là sự tưởng nhớ về sự hy sinh của Ngài trên
  thập tự giá.</p>',
                'content_en' => '<p>We believe that Jesus instituted two ordinances
  for the Church: Baptism and the Lord\'s Supper. Baptism symbolizes death, burial, and
   resurrection with Christ. The Lord\'s Supper is a remembrance of His sacrifice on
  the cross.</p>',
                'scripture_references' => ['Matthew 28:19', 'Romans 6:3-4', '1
  Corinthians 11:23-26', 'Acts 2:38'],
                'order' => 2,
                'is_active' => true,
            ],

            // LAST THINGS - 2 statements
            [
                'faith_category_id' => $lastThings->id,
                'title_vi' => 'Sự Tái Lâm của Đấng Christ',
                'title_en' => 'The Second Coming of Christ',
                'slug_vi' => 'su-tai-lam-cua-dang-christ',
                'slug_en' => 'the-second-coming-of-christ',
                'content_vi' => '<p>Chúng ta tin rằng Chúa Giê-xu Christ sẽ trở lại
  một cách hữu hình và vinh hiển để thiết lập vương quốc Ngài. Sự trở lại này là niềm
  hy vọng phước hạnh của tất cả tín đồ.</p>',
                'content_en' => '<p>We believe that Jesus Christ will return visibly
  and gloriously to establish His kingdom. This return is the blessed hope of all
  believers.</p>',
                'scripture_references' => ['Acts 1:11', '1 Thessalonians 4:16-17',
                    'Revelation 19:11-16', 'Titus 2:13'],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'faith_category_id' => $lastThings->id,
                'title_vi' => 'Sự Phục Sinh và Đời Đời',
                'title_en' => 'Resurrection and Eternal Life',
                'slug_vi' => 'su-phuc-sinh-va-doi-doi',
                'slug_en' => 'resurrection-and-eternal-life',
                'content_vi' => '<p>Chúng ta tin vào sự phục sinh thể xác của cả
  người công bình và người không công bình. Những ai tin Chúa sẽ sống đời đời với Ngài
  trong thiên đàng. Những ai từ chối Ngài sẽ phải đối mặt với sự phán xét đời
  đời.</p>',
                'content_en' => '<p>We believe in the bodily resurrection of both the
   righteous and the unrighteous. Those who trust in Christ will live eternally with
  Him in heaven. Those who reject Him will face eternal judgment.</p>',
                'scripture_references' => ['John 5:28-29', '1 Corinthians 15:20-23',
                    'Revelation 20:11-15', 'Matthew 25:46'],
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($statements as $statement) {
            FaithStatement::create($statement);
        }
    }
}
