CREATE TABLE chuongtrinhhoc (
    vien character varying(50) NOT NULL,
    mamh character varying(10) NOT NULL,
    tenmh character varying(50) NOT NULL,
    tinchi integer NOT NULL,
    kihoc integer NOT NULL,
    makhoa character varying(15) NOT NULL
);

CREATE TABLE dangki (
    mssv character varying(10) NOT NULL,
    tenmh character varying(50) NOT NULL,
    mamh character varying(10) NOT NULL,
    tinchi integer NOT NULL,
    makhoa character varying(15) NOT NULL
);

CREATE TABLE giangvien (
    magv character varying(10) NOT NULL,
    tengv character varying(50) NOT NULL,
    gioitinh character varying(4) NOT NULL,
    mail character varying(40) NOT NULL,
    makhoa character varying(10) NOT NULL
);

CREATE TABLE khoa (
    makhoa character varying(10) NOT NULL,
    tenkhoa character varying(50) NOT NULL
);

CREATE TABLE lop (
    malop character varying(10) NOT NULL,
    tenlop character varying(30) NOT NULL,
    makhoaquanli character varying(50) NOT NULL,
    magv character varying(10) NOT NULL
);

CREATE TABLE monhoc (
    mamh character varying(8) NOT NULL,
    tenmh character varying(50) NOT NULL,
    tinchi integer NOT NULL,
    makhoa character varying(30) NOT NULL
);

CREATE TABLE sinhvien (
    mssv character varying(10) NOT NULL,
    hoten character varying(30) NOT NULL,
    ngaysinh date,
    gioitinh character varying(4) NOT NULL,
    quequan character varying(30) NOT NULL,
    malop character varying(20) NOT NULL,
    makhoaquanli character varying(50) NOT NULL
);

CREATE TABLE taikhoan(
   taikhoan character varying(10) NOT NULL,
   matkhau character varying(10) NOT NULL
);


ALTER TABLE dangki ADD CONSTRAINT pkey_dangki PRIMARY KEY (mssv,mamh);

ALTER TABLE giangvien ADD CONSTRAINT pkey_giangvien PRIMARY KEY (magv);

ALTER TABLE khoa ADD CONSTRAINT pkey_khoa PRIMARY KEY (makhoa);

ALTER TABLE lop ADD CONSTRAINT pkey_lop PRIMARY KEY (malop);

ALTER TABLE monhoc ADD CONSTRAINT pkey_monhoc PRIMARY KEY (mamh);

ALTER TABLE sinhvien ADD CONSTRAINT pkey_sinhvien PRIMARY KEY (mssv);

ALTER TABLE chuongtrinhhoc ADD CONSTRAINT pkey_chuongtrinhhoc PRIMARY KEY (vien,mamh);



ALTER TABLE sinhvien ADD CONSTRAINT fk_sinhvien_khoa FOREIGN KEY (makhoaquanli) REFERENCES khoa(makhoa) ON UPDATE CASCADE ;

--ALTER TABLE chuongtrinhhoc ADD CONSTRAINT fk_chuongtrinhhoc_khoa FOREIGN KEY (makhoa) REFERENCES khoa(makhoa);


ALTER TABLE giangvien ADD CONSTRAINT fk_giangvien_khoa FOREIGN KEY (makhoa) REFERENCES khoa(makhoa) ON UPDATE CASCADE ;

ALTER TABLE lop ADD CONSTRAINT fk_lop_giangvien FOREIGN KEY (magv) REFERENCES giangvien(magv) ON UPDATE CASCADE ;

ALTER TABLE lop ADD CONSTRAINT fk_lop_khoa FOREIGN KEY (makhoaquanli) REFERENCES khoa(makhoa) ON UPDATE CASCADE ;

ALTER TABLE sinhvien ADD CONSTRAINT fk_sinhvien_lop FOREIGN KEY (malop) REFERENCES lop(malop) ON UPDATE CASCADE ;



ALTER TABLE monhoc ADD CONSTRAINT fk_monhoc_khoa FOREIGN KEY (makhoa) REFERENCES khoa(makhoa) ON UPDATE CASCADE ;










--insert du lieu vao bang khoa
insert into khoa (makhoa, tenkhoa)values
('KKTVQL',	'Khoa kinh tế và quản lí'),
('KML'	,'Khoa lí luận chính trị'),
('KGDQP',	'Khoa giáo dục quốc phòng'),
('BGDTC' 	,'Bộ môn giáo dục thể chất'),
('VVLKT',	'Viện vật lí kĩ thuật'),
('BDHDADTCVT' 	,'Bộ môn tiếng nhật'),
('KTUD',	'Viện toán ứng dụng và tin học'),
('KCNTT',	'Khoa công nghệ thông tin'),
('VKTHH',	'Viện kĩ thuật hóa học');

--insert du lieu vao bang giang vien

insert into giangvien(magv,tengv,gioitinh,mail,makhoa) values
('KTVQL01',	'Nguyễn Văn Lâm',	'Nam',	'lam.nguyenvan@hust.edu.vn',	'KKTVQL'),
('ML01',	'Lương Thị Phương Thảo',	'Nữ',	'thao.luongthiphuong@hust.edu.vn',	'KML'),
('GDQP01', 	'Đoàn Cao Thắng',	'Nam',	'thang.caodoan@hust.edu.vn',	'KGDQP'),
('GDQP02', 	'Trần Đức Quyết', 	'Nam',	'quyet.tranduc@hust.edu.vn', 	'KGDQP'),
('GDTC01', 	'Đoàn Chiến Vinh',	'Nam',	'vinh.doanchien@hust.edu.vn',	'BGDTC'), 
('GDTC02', 	'Kiều Quang Thuyết',	'Nam',	'thuyet.kieuquang@hust.edu.vn',	'BGDTC'), 
('VLKT01',	'Nguyễn Hữu Lâm', 	'Nam',	'lam.nguyenhuu@hust.edu.vn',	'VVLKT'),
('BDHD01', 	'Viết Thu Huyền',	'Nữ','huyen.vietthu@hust.edu.vn', 	'BDHDADTCVT'), 
('TUD01',	'Phan Xuân Thành',	'Nam',	'thanh.phanxuan@hust.edu.vn',	'KTUD'),
('CNTT01',	'Nguyễn Kim Khánh',	'Nam',	'khanh.nguyenkim@hust.edu.vn',	'KCNTT'),
('CNTT02',	'Nguyễn Duy Hiệp',	'Nam',	'hiep.nguyenduy@hust.edu.vn',	'KCNTT'),
('CNTT03',	'Nguyễn Đức Nghĩa',	'Nam',	'nghia.nguyenduc@hust.edu.vn',	'KCNTT'),
('TUD02',	'Lê Kim Thư',	'Nữ',	'thu.lekim@hust.edu.vn',	'KTUD'),
('TUD03',	'Lê Chí Ngọc',	'Nam',	'ngoc.lechi@hust.edu.vn',	'KTUD'),
('TUD04',	'Lê Hải Hà',	'Nam',	'ha.lehai@hust.edu.vn',	'KTUD'),
('KTHH01',	'Cao Hồng Hà',	'Nam',	'ha.caohong@hust.edu.vn',	'VKTHH'),
('KTHH02',	'Nguyễn Thu Hà',	'Nữ',	'ha.nguyenthu@hust.edu.vn',	'VKTHH'),
('KTHH03',	'Trần Vân Anh',	'Nữ',	'anh.tranvan@hust.edu.vn',	'VKTHH');

--insert du lieu vao bang chuong trinh hoc

insert into chuongtrinhhoc (vien,mamh,tenmh,tinchi,kihoc,makhoa) values
('KCNTT', 	'SSH1050',	'Tư tưởng Hồ Chí Minh',	'2',	'20172',	'KML'),
('KCNTT', 	'SSH1130',	'Đường lối CM của Đảng CSVN',	'3',	'20171',	'KML'),
('KCNTT', 	'MIL1110',	'Đường lối quân sự',	'0',	'20172',	'KGDQP'),
('KCNTT', 	'MIL1120',	'Công tác quốc phòng an ninh',	'0',	'20162',	'KGDQP'),
('KCNTT', 	'MIL1130',	'Quân sự chung và KCT bắn súng AK', 	'0',	'20162',	'KGDQP'),
('KCNTT', 	'PE1010',	'Giáo dục thể chất A',	'0',	'20161',	'BGDTC'),
('KCNTT', 	'PE1020',	'Giáo dục thể chất B',	'0',	'20162',	'BGDTC'),
('KCNTT',	'PE1030',	'Giáo dục thể chất C',	'0',	'20171',	'BGDTC'),
('KCNTT', 	'PH1017',	'Vật lí',	'3',	'20161',	'VVLKT'),
('KCNTT', 	'JP1110',	'Tiếng Nhật 1',	'5',	'20161',	'BDHDADTCVT'),
('KCNTT', 	'JP1120',	'Tiếng Nhật 2',	'5',	'20162',	'BDHDADTCVT'),
('KCNTT', 	'MI1012',	'Math1',	'3',	'20161',	'KTUD'),
('KCNTT', 	'MI1022',	'Math2', 	'3',	'20162',	'KTUD'),
('KCNTT', 	'IT2110',	'Nhập môn CNTT và TT',	'2',	'20162',	'KCNTT'),
('KCNTT', 	'IT3210',	'C Programming Language',	'2',	'20171',	'KCNTT'),
('KCNTT', 	'IT3230',	'Lập trình C cơ bản',	'2',	'20171',	'KCNTT'),
('KCNTT', 	'IT3282',	'Kiến trúc máy tính',	'2',	'20172',	'KCNTT'),
('KCNTT', 	'IT3312',	'Cấu trúc dữ liệu và giải thuật',	'2',	'20171',	'KCNTT'),
('KCNTT', 	'IT3250',	'Đạo đức máy tính',	'2',	'20172',	'KCNTT'),
('VKTHH',  	'EM1170',	'Pháp luật đại cương',	'2',	'20172',	'KKTVQL'),
('VKTHH',  	'SSH1050',	'Tư tưởng Hồ Chí Minh',	'2',	'20172',	'KML'),
('VKTHH',  	'SSH1130',	'Đường lối CM của Đảng CSVN',	'3',	'20171',	'KML'),
('VKTHH',  	'MIL1110',	'Đường lối quân sự',	'0',	'20172',	'KGDQP'),
('VKTHH',  	'MIL1120',	'Công tác quốc phòng an ninh',	'0',	'20162',	'KGDQP'),
('VKTHH',  	'MIL1130',	'Quân sự chung và KCT bắn súng AK', 	'0',	'20162',	'KGDQP'),
('VKTHH',  	'PE1010',	'Giáo dục thể chất A',	'0',	'20161',	'BGDTC'),
('VKTHH',  	'PE1020', 	'Giáo dục thể chất B',	'0',	'20162',	'BGDTC'),
('VKTHH',  	'PE1030',	'Giáo dục thể chất C',	'0',	'20171',	'BGDTC'),
('VKTHH',  	'PH1017',	'Vật lí',	'3',	'20161',	'VVLKT'),
('VKTHH',  	'MI1010',	'Giải tích 1',	'3',	'20161',	'KTUD'),
('VKTHH',  	'MI1030',	'Đại số',	'3',	'20161',	'KTUD'),
('VKTHH',  	'CH3472',	'Hóa kỹ thuật đại cương',	'3',	'20162',	'VKTHH'),
('VKTHH',  	'CH4091',	'Hóa học chất tạo màng',	'3',	'20162',	'VKTHH'),
('VKTHH',  	'CH3003',	'Hóa lí',	'3',	'20171',	'VKTHH'),
('VKTHH',  	'CH3200',	'Hóa hữu cơ 1',	'2',	'20171',	'VKTHH'),
('VKTHH',  	'CH3400',	'Quá trình và thiết bị',	'2',	'20171',	'VKTHH'),
('VKTHH',  	'CH3470',	'Kỹ thuật hóa học đại cương',	'2',	'20161',	'VKTHH'),
('VKTHH',  	'CH3310',	'Hóa phân tích',	'2',	'20172',	'VKTHH'),
('VKTHH',  	'CH4005',	'Phân tích hóa lý',	'3',	'20172',	'VKTHH'),
('KTUD',	'EM1170',	'Pháp luật đại cương',	'2',	'20172',	'KKTVQL'),
('KTUD',	'SSH1050',	'Tư tưởng Hồ Chí Minh',	'2',	'20172',	'KML'),
('KTUD',	'SSH1130',	'Đường lối CM của Đảng CSVN',	'3',	'20171',	'KML'),
('KTUD',	'MIL1110',	'Đường lối quân sự',	'0',	'20172',	'KGDQP'),
('KTUD',	'MIL1120',	'Công tác quốc phòng an ninh',	'0',	'20162',	'KGDQP'),
('KTUD',	'MIL1130',	'Quân sự chung và KCT bắn súng AK', 	'0',	'20162',	'KGDQP'),
('KTUD',	'PE1010',	'Giáo dục thể chất A',	'0',	'20161',	'BGDTC'),
('KTUD',	'PE1020', 	'Giáo dục thể chất B',	'0',	'20162',	'BGDTC'),
('KTUD',	'PE1030',	'Giáo dục thể chất C',	'0',	'20171',	'BGDTC'),
('KTUD',	'PH1017',	'Vật lí',	'3',	'20161',	'VVLKT'),
('KTUD',	'MI1010',	'Giải tích 1',	'3',	'20161',	'KTUD'),
('KTUD',	'MI1030',	'Đại số',	'3',	'20161',	'KTUD'),
('KTUD',	'MI3015',	'Toán ứng dụng',	'2',	'20161',	'KTUD'),
('KTUD',	'MI3020',	'Giải tích hàm',	'3',	'20172',	'KTUD'),
('KTUD',	'MI3025',	'Logic học',	'2',	'20172',	'KTUD'),
('KTUD',	'MI3034',	'Phép tính hình thức & ứng dụng',	'2',	'20162',	'KTUD'),
('KTUD',	'MI4202',	'Khai phá dữ liệu',	'3',	'20162',	'KTUD'),
('KTUD',	'MI3044',	'Phân tính thống kê & phân tích dữ liệu',	'1',	'20171',	'KTUD'),
('KTUD',	'MI3360',	'Thống kê toán học',	'2',	'20171',	'KTUD'),
('KTUD',	'MI4312',	'Cơ sở toán học của hệ mờ',	'3',	'20171',	'KTUD');

--insert du lieu vao bang lop

insert into lop (malop,tenlop,makhoaquanli,magv) values
('VNA.K61',	'Việt Nhật A K61',	'KCNTT',	'CNTT01'),
('VNB.K61',	'Việt Nhật B K61',	'KCNTT',	'CNTT02'),
('VNC.K61',	'Việt Nhật C K61',	'KCNTT',	'CNTT01'),
('HH01.K61',	'Kĩ thuật hóa học 01 K61',	'VKTHH',	'KTHH01'),
('HH02.K61',	'Kĩ thuật hóa học 02 K61',	'VKTHH',	'KTHH01'),
('HH03.K61',	'Kĩ thuật hóa học 03 K61',	'VKTHH',	'KTHH02'),
('T01.K61',	'Toán ứng dụng 01 K61',	'KTUD',	'TUD03'),
('T02.K61',	'Toán ứng dụng 02 K61',	'KTUD',	'TUD04'),
('T03.K61',	'Toán ứng dụng 03 K61',	'KTUD',	'TUD04');

--insert du lieu vao bang monhoc

insert into monhoc (mamh,tenmh,tinchi,makhoa) values
('EM1170',	'Pháp luật đại cương',	'2',	'KKTVQL'),
('SSH1050',	'Tư tưởng Hồ Chí Minh',	'2',	'KML'),
('SSH1130',	'Đường lối CM của Đảng CSVN',	'3',	'KML'),
('MIL1110',	'Đường lối quân sự',	'0',	'KGDQP'),
('MIL1120',	'Công tác quốc phòng an ninh',	'0',	'KGDQP'),
('MIL1130',	'Quân sự chung và KCT bắn súng AK', 	'0',	'KGDQP'),
('PE1010',	'Giáo dục thể chất A',	'0',	'BGDTC'),
('PE1020', 	'Giáo dục thể chất B',	'0',	'BGDTC'),
('PE1030',	'Giáo dục thể chất C',	'0',	'BGDTC'),
('PH1017',	'Vật lí',	'3',	'VVLKT'),
('JP1110',	'Tiếng Nhật 1',	'5',	'BDHDADTCVT'),
('JP1120',	'Tiếng Nhật 2',	'5',	'BDHDADTCVT'),
('MI1012',	'Math1',	'3',	'KTUD'),
('MI1022',	'Math2', 	'3',	'KTUD'),
('IT2110',	'Nhập môn CNTT và TT',	'2',	'KCNTT'),
('IT3210',	'C Programming Language',	'2',	'KCNTT'),
('IT3230',	'Lập trình C cơ bản',	'2',	'KCNTT'),
('IT3282',	'Kiến trúc máy tính',	'2',	'KCNTT'),
('IT3312',	'Cấu trúc dữ liệu và giải thuật',	'2',	'KCNTT'),
('IT3250',	'Đạo đức máy tính',	'2',	'KCNTT'),
('MI1010',	'Giải tích 1',	'3',	'KTUD'),
('MI1030',	'Đại số',	'3',	'KTUD'),
('MI3015',	'Toán ứng dụng',	'2',	'KTUD'),
('MI3020',	'Giải tích hàm',	'3',	'KTUD'),
('MI3025',	'Logic học',	'2',	'KTUD'),
('MI3034',	'Phép tính hình thức & ứng dụng',	'2',	'KTUD'),
('MI4202',	'Khai phá dữ liệu',	'3',	'KTUD'),
('MI3044',	'Phân tính thống kê & phân tích dữ liệu',	'1',	'KTUD'),
('MI3360',	'Thống kê toán học',	'2',	'KTUD'),
('MI4312',	'Cơ sở toán học của hệ mờ',	'3',	'KTUD'),
('CH3472',	'Hóa kỹ thuật đại cương',	'3',	'VKTHH'),
('CH4091',	'Hóa học chất tạo màng',	'3',	'VKTHH'),
('CH3003',	'Hóa lí',	'3',	'VKTHH'),
('CH3200',	'Hóa hữu cơ 1',	'2',	'VKTHH'),
('CH3400',	'Quá trình và thiết bị',	'2',	'VKTHH'),
('CH3470',	'Kỹ thuật hóa học đại cương',	'2',	'VKTHH'),
('CH3310',	'Hóa phân tích',	'2',	'VKTHH'),
('CH4005',	'Phân tích hóa lý',	'3',	'VKTHH');

--insert du lieu vao bang sinh vien

insert into sinhvien(mssv,hoten,ngaysinh,gioitinh,quequan,malop,makhoaquanli) values
('20160909',	'Đào Đăng Đạt',date	'1998-01-25',	'Nam',	'Nam Định',	'VNA.K61',	'KCNTT'),
('20160980',	'Dương Mạnh Đăng',date	'1998-06-16',	'Nam', 	'Ninh Bình', 	'VNA.K61',	'KCNTT'),
('20161150',	'Trần Vũ Đức',date	'1998-03-15',	'Nam',	'Hà Nội',	'VNA.K61',	'KCNTT'),
('20161357',	'Nguyễn Thị Hạnh',date'1998-11-15',	'Nữ',	'Hà Nội',	'VNA.K61',	'KCNTT'),
('20166135',	'Đỗ Đình Hoàng',date'1998-10-22',	'Nam',	'Hà Nội',	'VNA.K61',	'KCNTT'),
('20165099',	'Nguyễn Thị Dung',date	'1998-03-16',	'Nữ',	'Bắc Giang',	'VNB.K61',	'KCNTT'),
('20165917',	'Lã Ngọc Dương',date	'1998-07-24',	'Nam',	'Hưng Yên',	'VNB.K61',	'KCNTT'),
('20161091',	'Ngô Minh Đức',	date'1998-08-16',	'Nam',	'Hải Phòng',	'VNB.K61',	'KCNTT'),
('20161094',	'Nguyễn Anh Đức',	date'1998-08-26',	'Nam',	'Bắc Ninh',	'VNB.K61',	'KCNTT'),
('20166102',	'Nguyễn Minh Hiếu',	date'1998-11-11',	'Nam',	'Thanh Hóa',	'VNB.K61',	'KCNTT'),
('20161553',	'Nguyễn Văn Hiếu',	date'1998-04-20',	'Nam',	'Hà Nội',	'VNC.K61',	'KCNTT'),
('20161649',	'Đặng Quang Hoàng',	date'1998-02-25',	'Nam',	'Hưng Yên',	'VNC.K61',	'KCNTT'),
('20166475',	'Lê Thanh Nam',	date'1998-06-04',	'Nam',	'Thanh Hóa',	'VNC.K61',	'KCNTT'),
('20165645',	'Phùng Thị Trang',date'	1998-11-29',	'Nữ',	'Hà Nội',	'VNC.K61',	'KCNTT'),
('20166925',	'Nguyễn Hữu Tuấn',date'1998-08-23',	'Nam',	'Nghệ An',	'VNC.K61',	'KCNTT'),
('20162401',	'Lại Thùy Linh',date'1998-01-14',	'Nữ',	'Lạng Sơn',	'T01.K61',	'KTUD'),
('20162552',	'Ngô Xuân Lộc',	date'1998-11-23',	'Nam',	'Thái Bình',	'T01.K61',	'KTUD'),
('20162602',	'Hoàng Thanh Lưu',date	'1998-07-22',	'Nam',	'Hải Dương',	'T01.K61',	'KTUD'),
('20162665',	'Phạm Duy Mạnh',date	'1998-07-17',	'Nam',	'Ninh Bình', 	'T01.K61',	'KTUD'),
('20162695',	'Đặng Đình Minh',date	'1998-06-16',	'Nam',	'Thái Nguyên',	'T01.K61',	'KTUD'),
('20162890',	'Nguyễn Thị Ngân',date	'1998-07-25',	'Nữ',	'Hải Dương',	'T02.K61',	'KTUD'),
('20162901',	'Đinh Văn Nghĩa',date	'1998-10-24',	'Nam',	'Thanh Hóa',	'T02.K61',	'KTUD'),
('20163268',	'Lê Hồng Phượng',date	'1997-09-01',	'Nữ',	'Hà Nội',	'T02.K61',	'KTUD'),
('20163304',	'Ngô Quốc Quang',date	'1998-07-15',	'Nam',	'Hải Phòng',	'T02.K61',	'KTUD'),
('20163332',	'Vũ Mạnh Quang',date'1998-07-01',	'Nam',	'Bắc Ninh',	'T02.K61',	'KTUD'),
('20163420',	'Bùi Thị Quyên',date	'1998-06-02',	'Nữ',	'Hà Nội',	'T03.K61',	'KTUD'),
('20164315',	'Nguyễn Ngọc Sâm',date	'1998-09-22',	'Nữ',	'Quảng Ninh',	'T03.K61',	'KTUD'),
('20163484',	'Bùi Anh Tuấn',date	'1997-03-22',	'Nam',	'Thái Bình',	'T03.K61',	'KTUD'),
('20164243',	'Lê Thành Trung',date	'1998-12-02',	'Nam',	'Hà Nội',	'T03.K61',	'KTUD'),
('20164668',	'Nguyễn Tấn Việt',date	'1998-02-24',	'Nam',	'Hà Nội',	'T03.K61',	'KTUD'),
('20160351',	'Lê Thanh Bằng',date'1997-02-26',	'Nam',	'Thái Nguyên',	'HH01.K61',	'VKTHH'),
('20160368',	'Nguyễn Đức Bình',date	'1998-06-20',	'Nam',	'Hải Dương',	'HH01.K61',	'VKTHH'),
('20160741',	'Phạm Thị Dung',date	'1997-06-10',	'Nữ',	'Hà Nam',	'HH01.K61',	'VKTHH'),
('20161058',	'Đào Minh Đức',	date'1998-09-28',	'Nam',	'Hòa Bình',	'HH01.K61',	'VKTHH'),
('20161538',	'Nguyễn Lương Hiếu',date	'1998-09-09',	'Nam',	'Bắc Giang',	'HH01.K61',	'VKTHH'),
('20161959',	'Nguyễn Phi Hùng',date	'1998-03-16',	'Nam',	'Thái Nguyên',	'HH02.K61',	'VKTHH'),
('20161788',	'Bùi Quốc Huy',date	'1998-09-01',	'Nam',	'Nghệ An',	'HH02.K61',	'VKTHH'),
('20161806',	'Hứa Đức Huy',date	'1997-10-27',	'Nam',	'Nghệ An',	'HH02.K61',	'VKTHH'),
('20161916',	'Võ Thanh Huyền',date	'1998-10-26',	'Nữ',	'Hòa Bình',	'HH02.K61',	'VKTHH'),
('20162241',	'Nguyễn Trung Kiên',date	'1998-12-08',	'Nam',	'Thái Nguyên',	'HH02.K61',	'VKTHH'),
('20162146',	'Nguyễn Hữu Khánh',date'	1998-09-14',	'Nam',	'Nghệ An',	'HH03.K61',	'VKTHH'),
('20162329',	'Phạm Sơn Lâm',date	'1998-03-09',	'Nam',	'Hà Nội',	'HH03.K61',	'VKTHH'),
('20162348',	'Lê Thị Lệ',date	'1998-01-10',	'Nữ',	'Nghệ An',	'HH03.K61',	'VKTHH'),
('20162373',	'Bùi Thị Linh',date	'1998-02-20',	'Nữ',	'Hà Nam',	'HH03.K61',	'VKTHH'),
('20162447',	'Nguyễn Thị Linh',date	'1998-06-10',	'Nữ',	'Hà Nam',	'HH03.K61',	'VKTHH');

--insert du lieu vao bang dangki

insert into dangki(mssv,tenmh,mamh,tinchi,makhoa) values
('20165645',	'Giáo dục thể chất A',	'PE1010',	'0', 'BGDTC'),
('20165645',	'Vật lí', 	'PH1017',	'3', 'VVLKT'),
('20165645',	'Tiếng nhật 1',	'JP1110',	'5', 'BDHDADTCVT' ),
('20161553',	'Tiếng nhật 1',	'JP1110',	'5', 'BDHDADTCVT' ),
('20161553',	'Math1',	'MI1012', 	'3', 'KTUD');


insert into taikhoan(taikhoan,matkhau) values
('admin', '123'),
('20161553','20161553');










