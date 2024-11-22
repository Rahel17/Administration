CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "users"(
  "id" integer primary key autoincrement not null,
  "name" varchar not null,
  "npm" varchar not null,
  "npm_verified_at" datetime,
  "password" varchar not null default 'welcome12',
  "role" varchar check("role" in('admin', 'bendum', 'anggota')) not null default 'anggota',
  "remember_token" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE UNIQUE INDEX "users_npm_unique" on "users"("npm");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
  "email" varchar not null,
  "token" varchar not null,
  "created_at" datetime,
  primary key("email")
);
CREATE TABLE IF NOT EXISTS "sessions"(
  "id" varchar not null,
  "user_id" integer,
  "ip_address" varchar,
  "user_agent" text,
  "payload" text not null,
  "last_activity" integer not null,
  primary key("id")
);
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
  "key" varchar not null,
  "value" text not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks"(
  "key" varchar not null,
  "owner" varchar not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "jobs"(
  "id" integer primary key autoincrement not null,
  "queue" varchar not null,
  "payload" text not null,
  "attempts" integer not null,
  "reserved_at" integer,
  "available_at" integer not null,
  "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
  "id" varchar not null,
  "name" varchar not null,
  "total_jobs" integer not null,
  "pending_jobs" integer not null,
  "failed_jobs" integer not null,
  "failed_job_ids" text not null,
  "options" text,
  "cancelled_at" integer,
  "created_at" integer not null,
  "finished_at" integer,
  primary key("id")
);
CREATE TABLE IF NOT EXISTS "failed_jobs"(
  "id" integer primary key autoincrement not null,
  "uuid" varchar not null,
  "connection" text not null,
  "queue" text not null,
  "payload" text not null,
  "exception" text not null,
  "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "pemasukans"(
  "id" integer primary key autoincrement not null,
  "tanggal" date not null,
  "kategori" varchar check("kategori" in('proposal', 'sisa_proker', 'kas_wajib', 'lainnya')) not null,
  "uraian" text not null,
  "bidang" varchar check("bidang" in('Inti', 'PSDM', 'Kerohanian', 'Humas', 'Kominfo', 'Danus', 'Minbak')) not null,
  "nominal" numeric not null,
  "penanggungjawab" varchar not null,
  "dokumen" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "pengeluarans"(
  "id" integer primary key autoincrement not null,
  "tanggal" date not null,
  "kategori" varchar check("kategori" in('proker', 'lainnya')) not null,
  "uraian" text not null,
  "bidang" varchar check("bidang" in('Inti', 'PSDM', 'Kerohanian', 'Humas', 'Kominfo', 'Danus', 'Minbak')) not null,
  "nominal" numeric not null,
  "penanggungjawab" varchar not null,
  "dokumen" varchar,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "saldos"(
  "id" integer primary key autoincrement not null,
  "id_pemasukan" integer not null,
  "id_pengeluaran" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("id_pemasukan") references "pemasukans"("id") on delete cascade,
  foreign key("id_pengeluaran") references "pengeluarans"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "anggotas"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "bidang" varchar check("bidang" in('Inti', 'PSDM', 'Kerohanian', 'Humas', 'Kominfo', 'Danus', 'Minbak')) not null,
  "no_hp" varchar not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "kas"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "bidang" varchar not null,
  "bulan" text,
  "keterangan" varchar check("keterangan" in('lunas', 'belum_lunas')) not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id") on delete cascade
);

INSERT INTO migrations VALUES(9,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(10,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(11,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES(12,'2024_11_19_164544_create_pemasukans_table',1);
INSERT INTO migrations VALUES(13,'2024_11_20_011632_create_pengeluarans_table',1);
INSERT INTO migrations VALUES(14,'2024_11_20_013030_create_saldos_table',1);
INSERT INTO migrations VALUES(15,'2024_11_20_013353_create_anggotas_table',1);
INSERT INTO migrations VALUES(16,'2024_11_20_191943_create_kas_table',1);