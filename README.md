<div align="center">
<h1>DiamondAPI v1.0.0<h1>
<p>Đơn Vị Tiền Kim Cương</p>
</div>
  
<br>
  
## Features
- Làm 1 Đơn Vị Tiền Sử Dụng Trong Server
- Trao Đổi Và Mua Bám
  
<br>
 
## Commands

| **Command** | **Description** |
| --- | --- |
| **/diamond help** | **Các lệnh về Kim Cương** |
| **/diamond give** | **Lấy Kim Cương Cho Người Chơi** |
| **/diamond take** | **Lấy Kim Cương Của Người Chơi** |
| **/diamond set** | **Chỉnh Số Kim Cương CỦa Người Chơi** |
| **/diamond see** | **Xem Số Kim Cương Của Người Khác** |
| **/diamond my** | **Xem Số Kim Cương Của Bạn** |
| **/diamond top** | **Xem TOP Kim Cương Trong Server** |

<br>
 
## Config
  
```
---
default-diamond: 0
...
```

## Developer
- `reduceDiamond()` Để Lấy Đi Kim Cương Của Người Chơi
- `addDiamond()` Để Lấy Kim Cương Cho Người Chơi
- `setDiamond()` Để Chỉnh Số Kim Cương Của Người Chơi
- `myDiamond()` Để Xem Số Kim Cương Của Chính Họ
- `getAllDiamond()` Lấy Tất Cả Người Chơi Trong Dữ Liệu (Làm TOP Kim Cương)
