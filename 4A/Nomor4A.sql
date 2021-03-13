-- jawaban ini untuk menjawab pertanyaan nomor 4A Test Technical Online Bootcamp DumbWays.id tanggal 13 maret 2021.

-- query POST / menambah data.
-- Insert author/writers name to writer_tb table,categorys name to category_tb table, and books data to book_tb on database dumblibrary.
INSERT INTO writer_tb
    (name)
VALUES
    ('prayogo'),
    ('bagus'),
    ('suntoro');

INSERT INTO category_tb
    (name)
VALUES
    ('horror'),
    ('comedy'),
    ('mystery');

INSERT INTO book_tb
    (name, category_id, writer_id, publication_year, img)
VALUES
    ('lorem', '1', '1', '2000', 'lorem.jpg'),
    ('ipsum', '2', '1', '2001', 'ipsum.jpg'),
    ('damal', '3', '1', '2002', 'damal.jpg'),
    ('bare', '1', '2', '2002', 'bare.jpg'),
    ('beew', '2', '2', '2001', 'beww.jpg'),
    ('bgfgf', '3', '2', '2000', 'bgfgf.jpg'),
    ('kakr', '3', '3', '2002', 'kakr.jpg'),
    ('kakrdd', '2', '3', '2001', 'kakrdd.jpg'),
    ('tyty', '1', '3', '2000', 'tyty.jpg');

-- Tampilkan seluruh data dari table book.
SELECT *
FROM book_tb
;

-- Tampilkan seluruh data book, category dan penulis.
SELECT *
FROM book_tb
    LEFT JOIN writer_tb ON book_tb.writer_id = writer_tb.id
    LEFT JOIN category_tb ON book_tb.category_id = category_tb.id
;

-- Tampilkan seluruh data penulis.
SELECT *
FROM writer_tb;

-- Tampilkan spesifik book beserta, category maupun penulis. 
-- berdasarkan nama buku
SELECT bt.name, ct.name, wt.name
FROM book_tb bt
    LEFT JOIN category_tb ct ON bt.category_id = ct.id
    LEFT JOIN writer_tb wt ON bt.writer_id = wt.id
WHERE bt.name = 'ipsum'
;
-- berdasarkan tahun cetak/publikasi
SELECT bt.name, ct.name, wt.name
FROM book_tb bt
    LEFT JOIN category_tb ct ON bt.category_id = ct.id
    LEFT JOIN writer_tb wt ON bt.writer_id = wt.id
WHERE bt.publication_year = 2001
;