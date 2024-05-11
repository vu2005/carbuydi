<form class="form-select" action="#" method="POST">
    <div class="btn-function">
        <p>SẮP XẾP:</p>
        <span class="change-list">Liên quan nhất</span>
        <i class="bx bx-chevron-down"></i>
        <div class="card-list-function">
            <div class="card-list-function-body">
                <div class="index-fn">
                    <label for="">
                        <input type="radio" name="sorting" value="all_cars" checked />
                        <span>Liên quan nhất</span>
                    </label>
                </div>
                <div class="index-fn">
                    <p>Ngày đăng</p>
                    <label for="">
                        <input type="radio" name="sorting" value="newest" /><span>Mới nhất</span>
                    </label>
                    <label for="">
                        <input type="radio" name="sorting" value="oldest" /><span>Cũ nhất</span>
                    </label>
                </div>
                <div class="index-fn">
                    <p>Giá</p>
                    <label for="">
                        <input type="radio" name="sorting" value="price_asc" /><span>Tăng dần</span>
                    </label>
                    <label for="">
                        <input type="radio" name="sorting" value="price_desc" /><span>Giảm dần</span>
                    </label>
                </div>
                <div class="index-fn">
                    <p>Số km</p>
                    <label for="">
                        <input type="radio" name="sorting" value="mileage_asc" /><span>Tăng dần</span>
                    </label>
                    <label for="">
                        <input type="radio" name="sorting" value="mileage_desc" /><span>Giảm dần</span>
                    </label>
                </div>
                <div class="index-fn" style="border-bottom: none">
                    <p>Năm sản xuất</p>
                    <label for="">
                        <input type="radio" name="sorting" value="year_asc" /><span>Mới đến cũ</span>
                    </label>
                    <label for="">
                        <input type="radio" name="sorting" value="year_desc" /><span>Cũ đến mới</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit">Sắp xếp</button>
</form>
