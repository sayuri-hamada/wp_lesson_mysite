<?php
add_action('init', function () {
  // アイキャッチ画像の追加
  add_theme_support('post-thumbnails');

  // メニューをサポート
  register_nav_menus([
    // 連想配列を使用するので複数のメニューを管理できる
    'global_nav' => 'グローバルナビゲーション'
  ]);
});

/* アイキャッチ画像がなければ、標準画像を取得する */
function get_eyecatch_with_default()
{
  if (has_post_thumbnail()) :
    // アイキャッチ画像のIDを返す
    $id = get_post_thumbnail_id();
    // 引数の画像の情報を配列として返す（画像のパスは[0]の値を使用）
    $img = wp_get_attachment_image_src($id, 'large');
  else :
    // アイキャッチがない場合はデフォルトの画像を使用する
    $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
  endif;

  return $img;
}
