-- A. truy vấn người dùng 
-- 1. Lấy ra danh sách người dùng theo thứ tự tên theo Alphabet (A->Z)
select * from users order by user_name asc
-- 2. Lấy ra 07 người dùng theo thứ tự tên theo Alphabet (A->Z)
select * from users order by user_name asc limit 0,7
-- 3. Lấy ra danh sách người dùng theo thứ tự tên theo Alphabet (A->Z), trong đó tên
-- người dùng có chữ a
select * from users where user_name like '%a%' order by user_name asc 
-- 4. Lấy ra danh sách người dùng trong đó tên người dùng bắt đầu bằng chữ m
select * from users where user_name like 'm%'
-- 5. Lấy ra danh sách người dùng trong đó tên người dùng kết thúc bằng chữ i
select * from users where user_name like '%i'
-- 6. Lấy ra danh sách người dùng trong đó email người dùng là Gmail (ví dụ:
-- example@gmail.com)
select * from users where user_email like '%gmail'
-- 7. Lấy ra danh sách người dùng trong đó email người dùng là Gmail (ví dụ:
-- example@gmail.com), tên người dùng bắt đầu bằng chữ m
select * from users where user_email like '%gmail' and where user_name like 'm%'
--  8. Lấy ra danh sách người dùng trong đó email người dùng là Gmail (ví dụ:
-- example@gmail.com), tên người dùng có chữ i và tên người dùng có chiều dài lớn
-- hơn 5
select * from users where users_email like '%@gmail' and where user_name like '%i%' and length(users_name) > 5
-- 9. Lấy ra danh sách người dùng trong đó tên người dùng có chữ a, chiều dài từ 5 đến 9, 
--email dùng dịch vụ Gmail, trong tên email có chữ I (trong tên, chứ không phải
--domain exampleitest@yahoo.com)
select * from users where user_name like '%a%' and length(user_name) between 5 and 9 
and where user_email like '%@gmail.com' and where user_email like '%i%@%' --bảo đó có chữ i trong tên trước dấu @
-- 10. Lấy ra danh sách người dùng trong đó tên người dùng có chữ a, chiều dài từ 5
--đến 9 hoặc tên người dùng có chữ i, chiều dài nhỏ hơn 9 hoặc email dùng dịch vụ
--Gmail, trong tên email có chữ i
select * from users where 
(user_name like '%a%' and length(user_name) between 5 and 9)
or (where user_name like '%i%' and length(user_name) < 9)
or (where user_email like '%@gmail.com' or where user_email like '%i%@%')


--B. Truy vấn đơn hàng
-- 1. Liệt kê các hóa đơn của khách hàng, thông tin hiển thị gồm: mã user, tên user, mã
-- hóa đơn
select id_user, user_name, order_id from users join orders
on orders.user_id = users.user_id
-- 2. Liệt kê số lượng các hóa đơn của khách hàng: mã user, tên user, số đơn hàng
select id_user, user_name, count(id_user) as  "số đơn hàng" from orders 
join users on orders.user_id = users.user_id
group by id_user, user_name
-- 3. Liệt kê thông tin hóa đơn: mã đơn hàng, số sản phẩm
select order_id, count(product_id) as "số sản phẩm" from order_detail join products 
group by order_id
-- 4. Liệt kê thông tin mua hàng của người dùng: mã user, tên user, mã đơn hàng, tên sản
-- phẩm. Lưu ý: gôm nhóm theo đơn hàng, tránh hiển thị xen kẻ các đơn hàng với nhau
select user_id, user_name, order_id, product_name from users 
join orders on orders.user_id = users.user_id
join order_detail on order_detail.order_id = orders.order_id
join products on order_detail.product_id = products.product_id
group by orders.order_id; --Sắp xếp kết quả theo mã đơn hàng để nhóm các sản phẩm theo đơn hàng.
-- 5. Liệt kê 7 người dùng có số lượng đơn hàng nhiều nhất, thông tin hiển thị gồm: mã
-- user, tên user, số lượng đơn hàng
select user_id, user_name, count(orders.order_id) as "số lượng đơn hàng" from users
join orders on users.user_id = orders.user_id
group by user_id, user_name
limit 7 
-- 6. Liệt kê 7 người dùng mua sản phẩm có tên: Samsung hoặc Apple trong tên sản
-- phẩm, thông tin hiển thị gồm: mã user, tên user, mã đơn hàng, tên sản phẩm
select user_id, user_name, order_id, product_name 
from users 
join orders on orders.user_id = users.user_id
join order_detail on order_detail.order_id = orders.order_id
join products on products.product_id = order_detail.product_id 
where product_name like '%Samsung%' or product_name like '%Apple%'
limit 7
-- 7. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, thông tin
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền
select user_id, user_name, order_id, sum(products.product_price) as 'tổng tiền' 
from users 
join orders on orders.user_id = users.user_id
join order_detail on order_detail.order_id = orders.order_id
join products on products.product_id = order_detail.product_id 
group by user_id, user_name, order_id
-- 8. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, thông tin
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền. Mỗi user chỉ chọn ra 1 đơn
-- hàng có giá tiền lớn nhất. 
select user_id, user_name, order_id , MAX(subquery.total_price) as 'tổng tiền'
from users 
join (
    select user_id, user_name, order_id, sum(products.product_price) as total_price
    join orders on orders.user_id = users.user_id
    join order_detail on order_detail.order_id = orders.order_id
    join products on products.product_id = order_detail.product_id 
    group by user_id, user_name, order_id
) as subquery
on users.user_id = subquery.user_id
join orders on orders.order_id = subquery.order_id
group by user_id, user_name, order_id
--9. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, thông tin
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền, số sản phẩm. Mỗi user chỉ
-- chọn ra 1 đơn hàng có giá tiền nhỏ nhất.
select user_id, user_name, order_id, min(subquery.total_price) as 'Tổng tiền'
from users
join (
    select user_id, user_name, order_id, sum(products.product_price) as total_price
    from users 
    join orders on orders.user_id = users.user_id
    join order_detail on order_detail.order_id = orders.order_id
    join products on products.product_id = order_detail.product_id
    group by user_id, user_name, order_id
) as subquery on users.user_id = subquery.user_id
join orders on orders.order_id = subquery.order_id
group by user_id, user_name, order_id
-- 10. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, thông tin
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền, số sản phẩm. Mỗi user chỉ
-- chọn ra 1 đơn hàng có số sản phẩm là nhiều nhất.
select user_id, user_name, order_id, max(subquery.total_id) as 'Số lượng'
from users
join (
    select user_id, user_name, order_id, count(products.product_id) as total_id
    from users 
    join orders on orders.user_id = users.user_id
    join order_detail on order_detail.order_id = orders.order_id
    join products on products.product_id = order_detail.product_id
    group by user_id, user_name, order_id
) as subquery on users.user_id = subquery.user_id
join orders on orders.order_id = subquery.order_id
group by user_id, user_name, order_id