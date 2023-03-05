<?php
/**
 * @var $reviews
 */
?>
<section class="section section--review" id="review">
    <div class="container">
        <div class="review__header text-center mb-60">
            <span class="section__header">Отзывы</span>
            <h2 class="m-0">Что говорят наши ученики</h2>
        </div>
        <div class="review__slider" data-aos="zoom-in-down" data-aos-easing="linear" data-aos-duration="500">
            <div class="swiper-wrapper">
                <?php foreach ($reviews as $review) : ?>
                    <div class="review__item swiper-slide">
                        <div class="review__detail">
                            <p class="m-0"><?= $review['comment'] ?></p>
                        </div>
                        <div class="review__client-profile">
                            <img src="/public/assets/images/review/<?= $review['avatar'] ?>" alt="profilr-img1"
                                 class="img-fluid">
                            <div class="review__data">
                                <h3 class="m-0"><?= $review['name'] ?></h3>
                                <p><?= $review['city'] ?></p>
                                <div class="review__star-rating">
                                    <?php for ($i = 0; $i < $review['star_rating']; $i++) : ?>
                                        <i class="ri-star-fill"></i>
                                    <?php endfor ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>