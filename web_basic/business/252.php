<section id="container" class="business group_num_213">
    <div class="contents page_252">
        <div class="contenstView">
        </div>
    </div>
</section>

<style>
.section {
    padding: 40px;
    background: #f8f9fa;
}

.halfCont {
    margin-bottom: 80px;
    padding: 40px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.halfCont .contTitle {
    font-size: 2.4rem;
    color: #00afb1;
    margin-bottom: 25px;
    font-weight: 600;
}

.halfCont dd {
    font-size: 1.7rem;
    line-height: 1.8;
    color: #444;
}

.zigzagCont {
    display: flex;
    align-items: center;
    gap: 60px;
}

.zigzagCont .imgBox,
.zigzagCont dl {
    flex: 1;
}

.zigzagCont .imgBox {
    width: 560px;
    height: 315px;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background: #fff;
    position: relative;
}

.zigzagCont .imgBox img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
    transform: translateZ(0);
    backface-visibility: hidden;
    filter: brightness(1.02) contrast(1.02);
}

.zigzagCont .imgBox:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 15px;
    box-shadow: inset 0 0 2px rgba(255, 255, 255, 0.1);
    z-index: 1;
    pointer-events: none;
}

.zigzagCont .imgBox img:hover {
    transform: scale(1.05);
    filter: brightness(1.05) contrast(1.05);
}

@media (max-width: 768px) {
    .section {
        padding: 20px;
    }

    .zigzagCont {
        flex-direction: column;
        gap: 30px;
    }

    .zigzagCont .imgBox {
        width: 100%;
        height: 250px;
    }

    .halfCont .contTitle {
        font-size: 2rem;
    }

    .halfCont dd {
        font-size: 1.6rem;
    }
}
</style>