<?php
/**
 * Login Beautify 登录界面美化插件
 * 
 * @package LoginBeautify
 * @author LHL
 * @version 1.0.0
 * @link https://github.com/lhl77/Typecho-Plugin-LoginBeautify
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
  exit;
}

class LoginBeautify_Plugin implements Typecho_Plugin_Interface
{
  public static function activate()
  {
    Typecho_Plugin::factory('admin/header.php')->header = array(__CLASS__, 'adminHeader');
    Typecho_Plugin::factory('admin/footer.php')->end = array(__CLASS__, 'adminFooterEnd');
    return _t('LoginBeautify 已启用');
  }

  public static function deactivate()
  {
    return _t('LoginBeautify 已禁用');
  }

  public static function adminHeader($hed)
  {
    try {
      if (Typecho_Widget::widget('Widget_User')->hasLogin()) {
        return $hed;
      }
    } catch (Exception $e) {
      // ignore
    }

    ob_start();
    self::renderHeader();
    $inject = ob_get_clean();

    return $hed . $inject;
  }

  public static function adminFooterEnd()
  {
    try {
      if (Typecho_Widget::widget('Widget_User')->hasLogin()) {
        return;
      }
    } catch (Exception $e) {
      // ignore
    }

    self::renderFooter();
  }

  public static function config(Typecho_Widget_Helper_Form $form)
  {
    echo '<div style="margin:16px 0;padding:20px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border-radius:12px;box-shadow:0 4px 12px rgba(102,126,234,.25)">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:16px">
                <div style="width:64px;height:64px;background:rgba(255,255,255,.15);border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:32px;backdrop-filter:blur(10px);flex-shrink:0">
                    🎨
                </div>
                <div style="flex:1">
                    <h2 style="margin:0 0 8px;font-size:24px;font-weight:700;letter-spacing:-0.025em">Login Beautify</h2>
                    <p style="margin:0;font-size:14px;opacity:0.9;line-height:1.5">登录界面美化插件 · Material风格</p>
                </div>
            </div>
            
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid rgba(255,255,255,.15);display:flex;gap:12px;flex-wrap:wrap">
                <a href="https://github.com/lhl77/Typecho-Plugin-LoginBeautify" target="_blank" style="display:inline-flex;align-items:center;gap:6px;color:#fff;text-decoration:none;background:rgba(255,255,255,.15);padding:8px 14px;border-radius:8px;font-size:13px;font-weight:500;transition:all .2s;backdrop-filter:blur(10px)" onmouseover="this.style.background=\'rgba(255,255,255,.25)\'" onmouseout="this.style.background=\'rgba(255,255,255,.15)\'">
                    <svg style="width:16px;height:16px" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    GitHub 仓库
                </a>
                <a href="https://github.com/lhl77/Typecho-Plugin-LoginBeautify/issues" target="_blank" style="display:inline-flex;align-items:center;gap:6px;color:#fff;text-decoration:none;background:rgba(255,255,255,.15);padding:8px 14px;border-radius:8px;font-size:13px;font-weight:500;transition:all .2s;backdrop-filter:blur(10px)" onmouseover="this.style.background=\'rgba(255,255,255,.25)\'" onmouseout="this.style.background=\'rgba(255,255,255,.15)\'">
                    <svg style="width:16px;height:16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="16" x2="12" y2="12"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
                    反馈问题
                </a>
                <a href="https://blog.lhl.one/artical/892.html " target="_blank" style="display:inline-flex;align-items:center;gap:6px;color:#fff;text-decoration:none;background:rgba(255,255,255,.15);padding:8px 14px;border-radius:8px;font-size:13px;font-weight:500;transition:all .2s;backdrop-filter:blur(10px)" onmouseover="this.style.background=\'rgba(255,255,255,.25)\'" onmouseout="this.style.background=\'rgba(255,255,255,.15)\'">
                    <svg style="width:16px;height:16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                    作者博客
                </a>
            </div>
        </div>';

    // ====== 使用提示 ======
    echo '<div style="margin:16px 0;padding:16px;background:#f0f9ff;border:1px solid #bfdbfe;border-radius:10px">
            <div style="display:flex;align-items:flex-start;gap:12px">
                <svg style="width:20px;height:20px;flex-shrink:0;color:#3b82f6;margin-top:2px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 16v-4"/>
                    <path d="M12 8h.01"/>
                </svg>
                <div style="flex:1">
                    <strong style="color:#1e40af;font-size:14px;display:block;margin-bottom:8px">💡 快速开始</strong>
                    <ul style="margin:0;padding-left:20px;color:#1e40af;font-size:13px;line-height:1.8">
                        <li>选择喜欢的 <strong>配色方案</strong>,支持13种预设或自定义颜色</li>
                        <li>可选添加 <strong>背景图片</strong> 并设置虚化效果</li>
                        <li>使用下方 <strong>预览</strong> 查看效果,支持切换亮色/暗色主题</li>
                        <li>支持自定义 CSS/JS 实现更多个性化需求，如果CSS没有效果请加!important</li>
                    </ul>
                </div>
            </div>
        </div>';
    // ====== 检查更新 ======
    $updateInfo = self::checkUpdate();

    if ($updateInfo['hasUpdate']) {
      echo '<div style="margin:16px 0;padding:16px;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;border-radius:12px;box-shadow:0 4px 12px rgba(239,68,68,.25)">
                  <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
                      <svg style="width:24px;height:24px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/>
                          <path d="M21 3v5h-5"/>
                      </svg>
                      <strong style="font-size:16px">🎉 发现新版本!</strong>
                  </div>
                  <div style="margin-left:36px;line-height:1.6">
                      <p style="margin:4px 0;font-size:14px">当前版本: <code style="background:rgba(255,255,255,.2);padding:2px 6px;border-radius:4px">' . htmlspecialchars($updateInfo['currentVersion']) . '</code></p>
                      <p style="margin:4px 0;font-size:14px">最新版本: <code style="background:rgba(255,255,255,.2);padding:2px 6px;border-radius:4px">' . htmlspecialchars($updateInfo['latestVersion']) . '</code></p>
                      <div style="margin-top:12px;display:flex;gap:8px;flex-wrap:wrap">
                          <a href="' . htmlspecialchars($updateInfo['downloadUrl']) . '" target="_blank" style="display:inline-flex;align-items:center;gap:6px;color:#fff;text-decoration:none;background:rgba(255,255,255,.2);padding:8px 14px;border-radius:6px;font-weight:500;font-size:13px;transition:all .2s" onmouseover="this.style.background=\'rgba(255,255,255,.3)\'" onmouseout="this.style.background=\'rgba(255,255,255,.2)\'">
                              <svg style="width:16px;height:16px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                  <polyline points="7 10 12 15 17 10"/>
                                  <line x1="12" y1="15" x2="12" y2="3"/>
                              </svg>
                              立即下载更新
                          </a>
                          <a href="' . htmlspecialchars($updateInfo['releaseUrl']) . '" target="_blank" style="display:inline-flex;align-items:center;gap:6px;color:#fff;text-decoration:none;background:rgba(255,255,255,.15);padding:8px 14px;border-radius:6px;font-weight:500;font-size:13px;transition:all .2s" onmouseover="this.style.background=\'rgba(255,255,255,.25)\'" onmouseout="this.style.background=\'rgba(255,255,255,.15)\'">
                              查看更新日志
                          </a>
                      </div>
                  </div>
              </div>';
    } else if ($updateInfo['checked']) {
      echo '<div style="margin:16px 0;padding:12px 16px;background:linear-gradient(135deg,#10b981,#059669);color:#fff;border-radius:10px;box-shadow:0 4px 12px rgba(16,185,129,.2);display:flex;align-items:center;gap:12px">
                  <svg style="width:20px;height:20px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                      <polyline points="22 4 12 14.01 9 11.01"/>
                  </svg>
                  <span style="font-size:14px;font-weight:500">已是最新版本</span>
              </div>';
    } else if ($updateInfo['error']) {
      echo '<div style="margin:16px 0;padding:12px 16px;background:#f3f4f6;color:#6b7280;border-radius:10px;border:1px solid #e5e7eb;display:flex;align-items:center;gap:12px">
                  <svg style="width:18px;height:18px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="10"/>
                      <line x1="12" y1="8" x2="12" y2="12"/>
                      <line x1="12" y1="16" x2="12.01" y2="16"/>
                  </svg>
                  <span style="font-size:13px">无法检查更新: ' . htmlspecialchars($updateInfo['error']) . '</span>
              </div>';
    }

    // ====== 颜色预设方案 ======
    $colorPreset = new Typecho_Widget_Helper_Form_Element_Select(
      'colorPreset',
      array(
        'custom' => _t('自定义'),
        'purple' => _t('🟣 紫 (默认)'),
        'blue' => _t('🔵 蓝'),
        'pink' => _t('🌸 粉'),
        'green' => _t('🌿 绿'),
        'orange' => _t('🍊 橙'),
        'red' => _t('❤️ 红'),
        'teal' => _t('🌊 青'),
        'indigo' => _t('💙 靛蓝'),
        'sunset' => _t('🌅 日落渐变'),
        'ocean' => _t('🌊 海洋渐变'),
        'forest' => _t('🌲 森林渐变'),
        'lavender' => _t('💜 薰衣草'),
      ),
      'purple',
      _t('配色方案'),
      _t('选择预设配色或使用自定义颜色')
    );
    $form->addInput($colorPreset);

    // ====== 主题主色 ======
    $primaryColor = new Typecho_Widget_Helper_Form_Element_Text(
      'primaryColor',
      null,
      '#6750a4',
      _t('主题主色（自定义）'),
      _t('选择"自定义"方案后生效。如：#6750a4')
    );
    $form->addInput($primaryColor);

    $primaryColor2 = new Typecho_Widget_Helper_Form_Element_Text(
      'primaryColor2',
      null,
      '#7f67be',
      _t('主题辅色（自定义）'),
      _t('选择"自定义"方案后生效。如：#7f67be')
    );
    $form->addInput($primaryColor2);

    // ====== 站点名称显示 ======
    $showSiteName = new Typecho_Widget_Helper_Form_Element_Radio(
      'showSiteName',
      array('1' => _t('显示'), '0' => _t('隐藏')),
      '1',
      _t('显示站点名称')
    );
    $form->addInput($showSiteName);

    $themeMode = new Typecho_Widget_Helper_Form_Element_Radio(
      'themeMode',
      array('auto' => _t('跟随系统'), 'light' => _t('亮色'), 'dark' => _t('暗色')),
      'auto',
      _t('默认主题')
    );
    $form->addInput($themeMode);

    $showThemeToggle = new Typecho_Widget_Helper_Form_Element_Radio(
      'showThemeToggle',
      array('1' => _t('显示'), '0' => _t('隐藏')),
      '1',
      _t('显示主题切换按钮')
    );
    $form->addInput($showThemeToggle);

    $bgImage = new Typecho_Widget_Helper_Form_Element_Text(
      'bgImage',
      null,
      '',
      _t('背景图片 URL'),
      _t('留空则使用纯色背景。')
    );
    $form->addInput($bgImage);

    $blurType = new Typecho_Widget_Helper_Form_Element_Radio(
      'blurType',
      array(
        'none' => _t('不虚化'),
        'filter' => _t('背景图模糊（filter: blur）'),
        // 'backdrop' => _t('磨砂玻璃（backdrop-filter）')
      ),
      'filter',
      _t('虚化方式')
    );
    $form->addInput($blurType);

    $blurSize = new Typecho_Widget_Helper_Form_Element_Text(
      'blurSize',
      null,
      '12',
      _t('虚化大小(px)'),
      _t('建议 0-50。')
    );
    $form->addInput($blurSize);

    $customCss = new Typecho_Widget_Helper_Form_Element_Textarea(
      'customCss',
      null,
      '',
      _t('自定义 CSS'),
      _t('将注入到登录页。无需 style 标签。')
    );
    $form->addInput($customCss);

    $customJs = new Typecho_Widget_Helper_Form_Element_Textarea(
      'customJs',
      null,
      '',
      _t('自定义 JavaScript'),
      _t('将注入到登录页。无需 script 标签。')
    );
    $form->addInput($customJs);

    // ====== 设置页实时预览 ======
    try {
      $opt = Typecho_Widget::widget('Widget_Options')->plugin('LoginBeautify');
      $preset = isset($opt->colorPreset) ? (string) $opt->colorPreset : 'purple';
      $pc1 = isset($opt->primaryColor) ? (string) $opt->primaryColor : '#6750a4';
      $pc2 = isset($opt->primaryColor2) ? (string) $opt->primaryColor2 : '#7f67be';
      $bgUrl = isset($opt->bgImage) ? (string) $opt->bgImage : '';
      $blurTypeVal = isset($opt->blurType) ? (string) $opt->blurType : 'filter';
      $blurSizeVal = isset($opt->blurSize) ? (int) $opt->blurSize : 12;
    } catch (Exception $e) {
      $preset = 'purple';
      $pc1 = '#6750a4';
      $pc2 = '#7f67be';
      $bgUrl = '';
      $blurTypeVal = 'filter';
      $blurSizeVal = 12;
    }

    echo '<style>
  #lb-preview{margin-top:16px;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden;background:#fff;box-shadow:0 4px 12px rgba(0,0,0,.08)}
  #lb-preview .lbpv-head{padding:12px 16px;border-bottom:1px solid #e5e7eb;display:flex;justify-content:space-between;align-items:center;background:#fff}
  #lb-preview .lbpv-head strong{font-size:14px;color:#374151;font-weight:600}
  #lb-preview .lbpv-head .lbpv-left{display:flex;align-items:center;gap:12px}
  #lb-preview .lbpv-head .lbpv-theme-btns{display:flex;gap:6px;background:#f3f4f6;padding:3px;border-radius:8px}
  #lb-preview .lbpv-theme-btns button{padding:4px 12px;border:none;border-radius:6px;background:transparent;cursor:pointer;font-size:12px;font-weight:500;color:#6b7280;transition:all .2s}
  #lb-preview .lbpv-theme-btns button:hover{color:#374151}
  #lb-preview .lbpv-theme-btns button.active{background:#fff;color:#000;box-shadow:0 1px 3px rgba(0,0,0,.1)}
  #lb-preview .lbpv-refresh{padding:6px 12px;border:1px solid #e5e7eb;border-radius:6px;background:#fff;cursor:pointer;font-size:12px;color:#6b7280;transition:all .2s;display:flex;align-items:center;gap:6px}
  #lb-preview .lbpv-refresh:hover{background:#f9fafb;color:#374151;border-color:#d1d5db}
  #lb-preview .lbpv-refresh:active{transform:scale(0.96)}
  #lb-preview .lbpv-refresh svg{width:14px;height:14px;transition:transform .3s}
  #lb-preview .lbpv-refresh.spinning svg{animation:lb-spin .6s linear}
  @keyframes lb-spin{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
  #lb-preview .lbpv-body{padding:40px 20px;background:#f9fafb;min-height:420px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;transition:background .3s}
  #lb-preview .lbpv-bg{position:absolute;inset:0;background-size:cover;background-position:center;z-index:0;transform:scale(1.03);transition:all .3s}
  #lb-preview .lbpv-bg-overlay{position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.2),rgba(0,0,0,.4));z-index:1;transition:background .3s}
  #lb-preview[data-theme="light"] .lbpv-bg-overlay{background:linear-gradient(180deg,rgba(255,255,255,.2),rgba(255,255,255,.4))}
  #lb-preview .lbpv-card{position:relative;z-index:2;max-width:380px;width:100%;border-radius:20px;border:1px solid rgba(255,255,255,.6);background:rgba(255,255,255,.8);padding:32px 28px;box-shadow:0 20px 40px -10px rgba(0,0,0,.15), 0 0 0 1px rgba(255,255,255,.4) inset;transition:all .3s;backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);}
  #lb-preview[data-theme="dark"] .lbpv-card{background:rgba(20,20,20,.75);border-color:rgba(255,255,255,.08);box-shadow:0 25px 50px -12px rgba(0,0,0,.6), 0 0 0 1px rgba(255,255,255,.05) inset;}
  #lb-preview[data-theme="dark"] .lbpv-body{background:#111827}
  #lb-preview .lbpv-title{font-size:16px;font-weight:500;text-align:center;margin-bottom:6px;color:#4b5563;transition:color .3s}
  #lb-preview[data-theme="dark"] .lbpv-title{color:#9ca3af}
  #lb-preview .lbpv-sub{font-size:24px;font-weight:800;color:#111827;text-align:center;margin-bottom:28px;transition:color .3s;letter-spacing:-0.025em}
  #lb-preview[data-theme="dark"] .lbpv-sub{color:#f9fafb}
  #lb-preview .lbpv-field{margin-bottom:16px}
  #lb-preview .lbpv-label{display:block;font-size:12px;color:#6b7280;margin-bottom:6px;font-weight:500}
  #lb-preview[data-theme="dark"] .lbpv-label{color:#9ca3af}
  #lb-preview .lbpv-input{width:100%;box-sizing:border-box;padding:12px 14px;border-radius:10px;border:1px solid #e5e7eb;background:rgba(255,255,255,.8);font-size:14px;outline:none;transition:all .2s;color:#1f2937}
  #lb-preview[data-theme="dark"] .lbpv-input{background:rgba(0,0,0,.2);border-color:rgba(255,255,255,.1);color:#e5e7eb}
  #lb-preview .lbpv-btn{width:100%;padding:12px;border:0;border-radius:12px;color:#fff;font-weight:600;font-size:14px;cursor:pointer;transition:all .2s;margin-top:8px;box-shadow:0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -1px rgba(0,0,0,.06)}
  #lb-preview .lbpv-btn:hover{filter:brightness(1.08);transform:translateY(-1px);box-shadow:0 10px 15px -3px rgba(0,0,0,.15)}
  #lb-preview .lbpv-btn:active{transform:translateY(0);filter:brightness(0.95)}
  </style>';

    echo '<div id="lb-preview" data-theme="light">
    <div class="lbpv-head">
      <div class="lbpv-left">
        <strong>🎨 预览</strong>
        <button type="button" class="lbpv-refresh" id="lbpv-refresh" title="刷新预览">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"/>
          </svg>
          刷新
        </button>
      </div>
      <div class="lbpv-theme-btns">
        <button type="button" data-theme="light" class="lbpv-theme-light active">☀️ 亮色</button>
        <button type="button" data-theme="dark" class="lbpv-theme-dark">🌙 暗色</button>
      </div>
    </div>
    <div class="lbpv-body">
      <div class="lbpv-bg" id="lbpv-bg"></div>
      <div class="lbpv-bg-overlay"></div>
      <div class="lbpv-card">
        <div class="lbpv-title" id="lbpv-title">我的博客</div>
        <div class="lbpv-sub">登录</div>
        
        <div class="lbpv-field">
          <label class="lbpv-label">用户名/邮箱</label>
          <input type="text" class="lbpv-input" value="user" readonly>
        </div>
        
        <div class="lbpv-field">
          <label class="lbpv-label">密码</label>
          <input type="password" class="lbpv-input" value="password" readonly>
        </div>

        <button class="lbpv-btn" id="lbpv-btn" type="button">登录</button>
      </div>
    </div>
  </div>';

    echo '<script>
  (function(){
    var colorPresets = {
      purple: ["#6750a4", "#7f67be"],
      blue: ["#1e40af", "#3b82f6"],
      pink: ["#db2777", "#ec4899"],
      green: ["#059669", "#10b981"],
      orange: ["#ea580c", "#f97316"],
      red: ["#dc2626", "#ef4444"],
      teal: ["#0d9488", "#14b8a6"],
      indigo: ["#4f46e5", "#6366f1"],
      sunset: ["#f59e0b", "#ef4444"],
      ocean: ["#0ea5e9", "#06b6d4"],
      forest: ["#059669", "#84cc16"],
      lavender: ["#a855f7", "#c084fc"]
    };

    function val(name){
      var el = document.querySelector(\'[name="\' + name + \'"]\');
      if (!el) return "";
      if (el.type === "radio") {
        var c = document.querySelector(\'[name="\' + name + \'"]:checked\');
        return c ? c.value : "";
      }
      return (el.value || "").trim();
    }

    var btn = document.getElementById("lbpv-btn");
    var title = document.getElementById("lbpv-title");
    var bg = document.getElementById("lbpv-bg");
    var preview = document.getElementById("lb-preview");
    var themeButtons = preview.querySelectorAll(".lbpv-theme-btns button");
    var refreshBtn = document.getElementById("lbpv-refresh");

    function normalizeColor(s, fallback){
      s = (s || "").trim();
      return s ? s : fallback;
    }

    function getCurrentColors(){
      var preset = val("colorPreset") || "purple";
      var c1, c2;
      
      if (preset === "custom") {
        c1 = normalizeColor(val("primaryColor"), ' . json_encode($pc1) . ');
        c2 = normalizeColor(val("primaryColor2"), ' . json_encode($pc2) . ');
      } else {
        var colors = colorPresets[preset] || colorPresets.purple;
        c1 = colors[0];
        c2 = colors[1];
      }
      
      return {c1: c1, c2: c2};
    }

    function updateAllButtonColors(){
      var colors = getCurrentColors();
      var gradient = "linear-gradient(135deg," + colors.c1 + "," + colors.c2 + ")";
      
      // 更新登录按钮
      btn.style.background = gradient;
      // 为预览输入框设置焦点态模拟颜色
      var inputs = preview.querySelectorAll(".lbpv-input");
      inputs.forEach(function(inp){
          inp.style.caretColor = colors.c1;
      });

      // 更新所有主题按钮
      themeButtons.forEach(function(b){
        if (b.classList.contains("active")) {
          b.style.background = gradient;
          b.style.color = "#fff";
        } else {
          b.style.background = "#fff";
          b.style.color = "";
        }
      });
    }

    function render(){
      var showName = val("showSiteName") || "1";
      var bgUrl = val("bgImage") || "";
      var blurType = val("blurType") || "filter";
      var blurSize = parseInt(val("blurSize") || "12");
      if (isNaN(blurSize) || blurSize < 0) blurSize = 0;
      if (blurSize > 80) blurSize = 80;

      // 更新所有按钮颜色
      updateAllButtonColors();
      
      // 更新站点名称显示
      title.style.display = (showName === "1") ? "block" : "none";
      
      // 更新背景图和遮罩
      var overlay = preview.querySelector(".lbpv-bg-overlay");
      var body = preview.querySelector(".lbpv-body");
      
      if (bgUrl) {
        bg.style.backgroundImage = "url(\'" + bgUrl + "\')";
        bg.style.display = "block";
        // 有背景图时显示遮罩，根据当前主题应用样式
        overlay.style.display = "block";
        var currentTheme = preview.getAttribute("data-theme");
        if (currentTheme === "dark") {
          overlay.style.background = "linear-gradient(180deg,rgba(0,0,0,.3),rgba(0,0,0,.5))";
        } else {
          overlay.style.background = "transparent";
        }
        body.style.background = "transparent";
      } else {
        bg.style.backgroundImage = "none";
        bg.style.display = "none";
        // 无背景图时隐藏遮罩，显示纯色背景
        overlay.style.display = "none";
        var currentTheme = preview.getAttribute("data-theme");
        if (currentTheme === "dark") {
          body.style.background = "#111827";
        } else {
          body.style.background = "#f9fafb";
        }
      }
      
      // 更新虚化效果
      bg.style.filter = "";
      var card = preview.querySelector(".lbpv-card");
      // 重置 styles
      card.style.backdropFilter = "blur(20px)";
      card.style.webkitBackdropFilter = "blur(20px)";
      
      if (bgUrl && blurType === "filter") {
        bg.style.filter = "blur(" + blurSize + "px)";
      } else if (bgUrl && blurType === "backdrop") {
        var size = Math.max(20, blurSize); 
        card.style.backdropFilter = "blur(" + size + "px)";
        card.style.webkitBackdropFilter = "blur(" + size + "px)";
      }
    }

    // 刷新按钮
    refreshBtn.addEventListener("click", function(){
      this.classList.add("spinning");
      var self = this;
      setTimeout(function(){
        self.classList.remove("spinning");
      }, 600);
      render();
    });

    // 主题切换功能
    themeButtons.forEach(function(themeBtn){
      themeBtn.addEventListener("click", function(){
        var theme = this.getAttribute("data-theme");
        preview.setAttribute("data-theme", theme);
        
        // 更新按钮状态
        themeButtons.forEach(function(b){
          b.classList.remove("active");
        });
        
        this.classList.add("active");
        
        // 重新应用当前颜色和遮罩
        render();
      });
    });

    // 初始渲染
    setTimeout(function(){
      render();
    }, 500);
    return;
    // render();


    // 监听配置变化
    var presetSelect = document.querySelector(\'[name="colorPreset"]\');
    if (presetSelect) presetSelect.addEventListener("change", function(){
      render();
    });

    ["primaryColor","primaryColor2","bgImage","blurSize"].forEach(function(n){
      var el = document.querySelector(\'[name="\' + n + \'"]\');
      if (el) el.addEventListener("input", function(){
        render();
      });
    });
    
    var radios = document.querySelectorAll(\'[name="showSiteName"],[name="blurType"]\');
    for (var i=0;i<radios.length;i++){
      radios[i].addEventListener("change", function(){
        render();
      });
    }
  })();
  </script>';
  }

  public static function personalConfig(Typecho_Widget_Helper_Form $form)
  {
  }

  private static function opt()
  {
    $options = Typecho_Widget::widget('Widget_Options');
    return $options->plugin('LoginBeautify');
  }

  private static function jsString($s)
  {
    return json_encode((string) $s, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  }

  /**
   * 检查插件更新
   */
  private static function checkUpdate()
  {
    $currentVersion = 'v1.0.0';
    $result = array(
      'checked' => false,
      'hasUpdate' => false,
      'currentVersion' => $currentVersion,
      'latestVersion' => '',
      'downloadUrl' => '',
      'releaseUrl' => '',
      'error' => ''
    );

    try {
      // 使用 GitHub API 获取最新 release
      $apiUrl = 'https://api.github.com/repos/lhl77/Typecho-Plugin-LoginBeautify/releases/latest';

      $context = stream_context_create(array(
        'http' => array(
          'method' => 'GET',
          'header' => "User-Agent: Typecho-LoginBeautify-Plugin\r\n",
          'timeout' => 5
        )
      ));

      $response = @file_get_contents($apiUrl, false, $context);

      if ($response === false) {
        $result['error'] = '网络请求失败';
        return $result;
      }

      $data = json_decode($response, true);

      if (!$data || !isset($data['tag_name'])) {
        $result['error'] = '解析更新信息失败';
        return $result;
      }

      $result['checked'] = true;
      $latestVersion = $data['tag_name'];
      $result['latestVersion'] = $latestVersion;
      $result['releaseUrl'] = isset($data['html_url']) ? $data['html_url'] : 'https://github.com/lhl77/Typecho-Plugin-LoginBeautify/releases';

      // 查找 zip 下载链接
      if (isset($data['assets']) && is_array($data['assets'])) {
        foreach ($data['assets'] as $asset) {
          if (isset($asset['browser_download_url']) && strpos($asset['name'], '.zip') !== false) {
            $result['downloadUrl'] = $asset['browser_download_url'];
            break;
          }
        }
      }

      // 如果没有找到 asset,使用 zipball_url
      if (empty($result['downloadUrl']) && isset($data['zipball_url'])) {
        $result['downloadUrl'] = $data['zipball_url'];
      }

      // 比较版本号
      $current = self::normalizeVersion($currentVersion);
      $latest = self::normalizeVersion($latestVersion);

      if (version_compare($latest, $current, '>')) {
        $result['hasUpdate'] = true;
      }

    } catch (Exception $e) {
      $result['error'] = $e->getMessage();
    }

    return $result;
  }

  /**
   * 规范化版本号,移除 v 前缀
   */
  private static function normalizeVersion($version)
  {
    $version = trim($version);
    if (substr($version, 0, 1) === 'v' || substr($version, 0, 1) === 'V') {
      $version = substr($version, 1);
    }
    return $version;
  }

  public static function renderHeader()
  {
    $opt = self::opt();

    $themeMode = isset($opt->themeMode) ? (string) $opt->themeMode : 'auto';
    if (!in_array($themeMode, array('auto', 'light', 'dark'), true)) {
      $themeMode = 'auto';
    }

    $bgImage = trim((string) $opt->bgImage);
    $blurType = in_array($opt->blurType, array('none', 'filter', 'backdrop'), true) ? $opt->blurType : 'filter';

    $blurSize = (int) $opt->blurSize;
    if ($blurSize < 0)
      $blurSize = 0;
    if ($blurSize > 80)
      $blurSize = 80;

    $customCss = (string) $opt->customCss;

    // 颜色预设处理
    $preset = isset($opt->colorPreset) ? (string) $opt->colorPreset : 'purple';

    $colorPresets = array(
      'purple' => array('#6750a4', '#7f67be'),
      'blue' => array('#1e40af', '#3b82f6'),
      'pink' => array('#db2777', '#ec4899'),
      'green' => array('#059669', '#10b981'),
      'orange' => array('#ea580c', '#f97316'),
      'red' => array('#dc2626', '#ef4444'),
      'teal' => array('#0d9488', '#14b8a6'),
      'indigo' => array('#4f46e5', '#6366f1'),
      'sunset' => array('#f59e0b', '#ef4444'),
      'ocean' => array('#0ea5e9', '#06b6d4'),
      'forest' => array('#059669', '#84cc16'),
      'lavender' => array('#a855f7', '#c084fc')
    );

    if ($preset === 'custom') {
      $primary = isset($opt->primaryColor) && trim((string) $opt->primaryColor) !== '' ? trim((string) $opt->primaryColor) : '#6750a4';
      $primary2 = isset($opt->primaryColor2) && trim((string) $opt->primaryColor2) !== '' ? trim((string) $opt->primaryColor2) : '#7f67be';
    } else {
      $colors = isset($colorPresets[$preset]) ? $colorPresets[$preset] : $colorPresets['purple'];
      $primary = $colors[0];
      $primary2 = $colors[1];
    }

    $bgCss = $bgImage !== '' ? "url(" . htmlspecialchars($bgImage, ENT_QUOTES, 'UTF-8') . ")" : "none";

    echo "\n" . '<style id="loginbeautify-style">' . "\n";
    ?>
    :root{
    --lb-primary:<?php echo htmlspecialchars($primary, ENT_QUOTES, 'UTF-8'); ?>;
    --lb-primary2:<?php echo htmlspecialchars($primary2, ENT_QUOTES, 'UTF-8'); ?>;
    --lb-surface:#f3f4f5;
    --lb-surface-alpha:rgba(255,255,255,.8);
    --lb-on-surface:#111827;
    --lb-on-surface-muted:#4b5563;
    --lb-border:rgba(0,0,0,.08);
    --lb-shadow: 0 20px 40px -10px rgba(0,0,0,.15), 0 0 0 1px rgba(255,255,255,.4) inset;
    --lb-radius: 20px;
    --lb-input-bg: rgba(255,255,255,.8);
    --lb-input-border: #e5e7eb;

    --lb-bg-image: <?php echo $bgCss; ?>;
    --lb-blur: <?php echo (int) $blurSize; ?>px;
    }

    .typecho-login-wrap{
    opacity: 0 !important;
    position: absolute !important;
    pointer-events: none !important;
    }

    html[data-lb-theme="dark"]{
    --lb-surface:#111827;
    --lb-surface-alpha:rgba(20,20,20,.75);
    --lb-on-surface:#f9fafb;
    --lb-on-surface-muted:#9ca3af;
    --lb-border:rgba(255,255,255,.08);
    --lb-shadow: 0 25px 50px -12px rgba(0,0,0,.6), 0 0 0 1px rgba(255,255,255,.05) inset;
    --lb-input-bg: rgba(0,0,0,.2);
    --lb-input-border: rgba(255,255,255,.1);
    }

    /* 主题切换动画 */
    html{
    transition: background-color .3s ease, color .3s ease;
    }

    body{
    margin:0;
    background: var(--lb-surface);
    color: var(--lb-on-surface);
    font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans",
    sans-serif;
    transition: background-color .3s ease, color .3s ease;
    }

    body:not(:has(.lb-bg[style*="background-image"])) .lb-wrap{
    }

    .lb-wrap{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    position:relative;
    overflow:hidden;
    }

    .lb-bg{
    position:absolute;
    inset:0;
    background-image: var(--lb-bg-image);
    background-size: cover;
    background-position: center;
    background-repeat:no-repeat;
    z-index:-2;
    transform: scale(1.03);
    }

    .lb-bg-overlay{
    position:absolute;
    inset:0;
    background: linear-gradient(180deg, rgba(0,0,0,.2), rgba(0,0,0,.4));
    z-index:-1;
    transition: background .3s ease;
    }

    html[data-lb-theme="light"] .lb-bg-overlay{
<<<<<<< HEAD
    background: linear-gradient(180deg, rgba(255,255,255,.2), rgba(255,255,255,.4));
=======
    background: linear-gradient(180deg, rgba(255,255,255,0), rgba(255,255,255,0));
>>>>>>> d92f08e1d9663834e4742c3ab025c808d5af06fa
    }

    .lb-card{
    width:min(400px, 94%);
    background: var(--lb-surface-alpha);
    color: var(--lb-on-surface);
    border: 1px solid var(--lb-border);
    border-radius: var(--lb-radius);
    box-shadow: var(--lb-shadow);
    padding: 32px 32px 28px;
    transition: background-color .3s ease, border-color .3s ease, box-shadow .3s ease;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    }

    <?php if ($blurType === 'backdrop') { ?>
      .lb-card{
      backdrop-filter: blur(var(--lb-blur));
      -webkit-backdrop-filter: blur(var(--lb-blur));
      }
    <?php } ?>

    <?php if ($blurType === 'filter') { ?>
      .lb-bg{
      filter: blur(var(--lb-blur));
      }
    <?php } ?>

    .lb-head{
    display:flex;
    flex-direction:column;
    align-items:center;
    text-align:center;
    margin-bottom: 20px;
    }

    .lb-title{
    display:flex;
    flex-direction:column;
    gap:8px;
    width:100%;
    }

    .lb-title .name{
    font-size: 16px;
    font-weight: 500;
    color: var(--lb-on-surface-muted);
    }

    .lb-title .sub{
    font-size: 24px;
    font-weight: 800;
    letter-spacing: -0.025em;
    color: var(--lb-on-surface);
    margin-bottom: 8px;
    }

    .lb-form .lb-field{
    margin-top: 16px;
    }

    .lb-form label{
    display:block;
    font-size: 12px;
    font-weight: 500;
    color: var(--lb-on-surface-muted);
    margin: 0 0 6px 1px;
    }

    .lb-form input[type="text"],
    .lb-form input[type="password"]{
    width:100%;
    box-sizing:border-box;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid var(--lb-input-border);
    background: var(--lb-input-bg);
    color: var(--lb-on-surface);
    font-size: 14px;
    outline: none;
    transition: all .2s ease;
    }

    html[data-lb-theme="dark"] .lb-form input[type="text"],
    html[data-lb-theme="dark"] .lb-form input[type="password"]{
    background: rgba(255,255,255,.06);
    }

    .lb-form input[type="text"]:focus,
    .lb-form input[type="password"]:focus{
    border-color: var(--lb-primary);
    background: var(--lb-surface);
    box-shadow: 0 0 0 3px color-mix(in srgb, var(--lb-primary) 15%, transparent);
    }

    /* 兼容旧版浏览器 */
    @supports not (color: color-mix(in srgb, red, blue)) {
    .lb-form input[type="text"]:focus,
    .lb-form input[type="password"]:focus{
    box-shadow: 0 0 0 4px rgba(103,80,164,.18);
    }

    html[data-lb-theme="dark"] .lb-form input[type="text"]:focus,
    html[data-lb-theme="dark"] .lb-form input[type="password"]:focus{
    box-shadow: 0 0 0 4px rgba(103,80,164,.25);
    }
    }

    .lb-actions{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    margin: 12px 0 6px;
    }

    .lb-remember{
    font-size: 13px;
    color: var(--lb-on-surface2);
    display:flex;
    align-items:center;
    gap:8px;
    }

    .lb-remember input{ accent-color: var(--lb-primary); }

    .lb-submit input[type="submit"],
    .lb-submit button{
    width:100%;
    margin-top: 20px;
    border:0;
    cursor:pointer;
    padding: 12px 16px;
    border-radius: 12px;
    font-size: 14px;
    background: linear-gradient(135deg, var(--lb-primary), var(--lb-primary2));
    color:#fff;
    font-weight:600;
    letter-spacing:0.5px;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -1px rgba(0,0,0,.06);
    transition: all .2s ease;
    }

    .lb-submit input[type="submit"]:hover{
    filter: brightness(1.08);
    transform: translateY(-1px);
    box-shadow: 0 10px 15px -3px color-mix(in srgb, var(--lb-primary) 30%, transparent);
    }

    /* 兼容旧版浏览器 */
    @supports not (color: color-mix(in srgb, red, blue)) {
    .lb-submit input[type="submit"]:hover{
    box-shadow: 0 10px 24px rgba(103,80,164,.30);
    }
    }

    /* 优化错误/提示消息框 */
    .message.popup{
    top: 20px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    width: auto !important;
    max-width: calc(100vw - 40px) !important;
    min-width: 280px !important;
    border-radius: 10px !important;
    padding: 0 !important;
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
    animation: lb-slide-down 0.3s ease-out !important;
    z-index: 9999 !important;
    }

    .notice{
    background:none!important;
    }

    @keyframes lb-slide-down {
    from {
    opacity: 0;
    transform: translateX(-50%) translateY(-20px);
    }
    to {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
    }
    }

    .message.popup ul{
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
    }

    .message.popup ul li{
    padding: 14px 18px !important;
    margin: 5px !important;
    font-size: 14px !important;
    line-height: 1.5 !important;
    color: var(--lb-on-surface) !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    }

    .message.popup ul li:before{
    content: '⚠' !important;
    font-size: 18px !important;
    display: inline-block !important;
    }

    .message.popup.notice ul li{
    background: linear-gradient(135deg, #f59e0b, #ef4444) !important;
    color: #fff !important;
    border-radius: 14px !important;
    }

    .message.popup.notice ul li:before{
    content: '⚠' !important;
    font-weight: bold !important;
    }

    .message.popup.success ul li{
    background: linear-gradient(135deg, #10b981, #059669) !important;
    color: #fff !important;
    border-radius: 14px !important;
    }

    .message.popup.success ul li:before{
    content: '✓' !important;
    font-weight: bold !important;
    }

    /* 移动端适配 */
    @media (max-width: 480px) {
    .message.popup{
    top: 16px !important;
    max-width: calc(100vw - 32px) !important;
    min-width: 260px !important;
    }
    .message.popup ul li{
    padding: 12px 16px !important;
    font-size: 13px !important;
    }
    }

    /* 优化主题切换按钮 */
    .lb-theme-toggle{
    position: fixed;
    right: 20px;
    top: 20px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 1px solid var(--lb-outline);
    background: var(--lb-surface2);
    color: var(--lb-on-surface);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 12px rgba(0,0,0,.12);
    cursor:pointer;
    transition: all .25s cubic-bezier(0.4, 0, 0.2, 1);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:0;
    z-index:1000;
    }

    .lb-theme-toggle:hover{
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,.18);
    border-color: var(--lb-primary);
    }

    .lb-theme-toggle:active {
    transform: translateY(0) scale(0.98);
    box-shadow: 0 2px 8px rgba(0,0,0,.12);
    }

    .lb-theme-toggle svg{
    width: 20px;
    height: 20px;
    transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .lb-theme-toggle .lb-icon-sun,
    .lb-theme-toggle .lb-icon-moon{
    position: absolute;
    transition: opacity .3s ease, transform .3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* 亮色模式:显示月亮图标 */
    html[data-lb-theme="light"] .lb-theme-toggle .lb-icon-sun{
    opacity: 0;
    transform: rotate(-90deg) scale(0.8);
    }

    html[data-lb-theme="light"] .lb-theme-toggle .lb-icon-moon{
    opacity: 1;
    transform: rotate(0) scale(1);
    }

    /* 暗色模式:显示太阳图标 */
    html[data-lb-theme="dark"] .lb-theme-toggle .lb-icon-sun{
    opacity: 1;
    transform: rotate(0) scale(1);
    }

    html[data-lb-theme="dark"] .lb-theme-toggle .lb-icon-moon{
    opacity: 0;
    transform: rotate(90deg) scale(0.8);
    }

    /* 移动端优化 */
    @media (max-width: 480px) {
    .lb-theme-toggle{
    right: 16px;
    top: 16px;
    width: 44px;
    height: 44px;
    }
    .lb-theme-toggle svg{
    width: 18px;
    height: 18px;
    }
    }

    .lb-hide { display:none !important; }

    <?php
    if (trim($customCss) !== '') {
      echo "\n/* --- LoginBeautify custom css --- */\n";
      echo $customCss . "\n";
    }

    echo "</style>\n";

    $jsThemeMode = self::jsString($themeMode);
    echo "\n<script id=\"loginbeautify-theme-init\">
  (function(){
    try{
      var mode = {$jsThemeMode};
      var saved = localStorage.getItem('lb-theme');
      var dark = false;

      if (saved === 'light' || saved === 'dark') {
        dark = saved === 'dark';
      } else if (mode === 'dark') {
        dark = true;
      } else if (mode === 'light') {
        dark = false;
      } else {
        dark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      }

      document.documentElement.setAttribute('data-lb-theme', dark ? 'dark' : 'light');
    }catch(e){}
  })();
  </script>\n";
  }

  public static function renderFooter()
  {
    $opt = self::opt();

    $showSiteName = ((string) $opt->showSiteName !== '0');
    $showThemeToggle = ((string) $opt->showThemeToggle !== '0');

    $customJs = (string) $opt->customJs;

    $options = Typecho_Widget::widget('Widget_Options');
    $siteTitle = (string) $options->title;

    $jsSiteTitle = self::jsString($siteTitle);
    $jsShowSiteName = $showSiteName ? 'true' : 'false';
    $jsShowToggle = $showThemeToggle ? 'true' : 'false';

    echo "\n<script id=\"loginbeautify-main\">
  (function(){
    function qs(sel, root){ return (root||document).querySelector(sel); }
    function qsa(sel, root){ return Array.prototype.slice.call((root||document).querySelectorAll(sel)); }

    var form = qs('form[action*=\"login\"]') || qs('form') || qs('.typecho-login form') || qs('.typecho-login');
    if (!form) return;

    var wrap = document.createElement('div');
    wrap.className = 'lb-wrap';

    var bg = document.createElement('div');
    bg.className = 'lb-bg';
    wrap.appendChild(bg);

    var overlay = document.createElement('div');
    overlay.className = 'lb-bg-overlay';
    wrap.appendChild(overlay);

    var card = document.createElement('div');
    card.className = 'lb-card';

    var head = document.createElement('div');
    head.className = 'lb-head';

    var titleWrap = document.createElement('div');
    titleWrap.className = 'lb-title';

    var showSiteName = {$jsShowSiteName};

    if (showSiteName) {
      var name = document.createElement('div');
      name.className = 'name';
      name.textContent = {$jsSiteTitle};
      titleWrap.appendChild(name);
    }

    var sub = document.createElement('div');
    sub.className = 'sub';
    sub.textContent = '登录';
    titleWrap.appendChild(sub);

    head.appendChild(titleWrap);
    card.appendChild(head);

    form.classList.add('lb-form');

    var inputs = qsa('input[type=\"text\"], input[type=\"password\"], input[type=\"email\"]', form);
    inputs.forEach(function(input){
      var field = document.createElement('div');
      field.className = 'lb-field';

      var label = document.createElement('label');
      var n = (input.getAttribute('name') || '').toLowerCase();
      if (n.indexOf('name') !== -1 || n.indexOf('user') !== -1) {
        label.textContent = '用户名/邮箱';
<<<<<<< HEAD
        if (!input.getAttribute('placeholder')) {
          input.setAttribute('placeholder', '请输入用户名或邮箱');
        }
=======
        input.setAttribute('placeholder', '用户名/邮箱');
>>>>>>> d92f08e1d9663834e4742c3ab025c808d5af06fa
      } else if (n.indexOf('pass') !== -1) {
        label.textContent = '密码';
        if (!input.getAttribute('placeholder')) {
          input.setAttribute('placeholder', '请输入密码');
        }
      } else {
        label.textContent = '输入';
        if (!input.getAttribute('placeholder')) {
          input.setAttribute('placeholder', '请输入内容');
        }
      }

      var parent = input.parentNode;
      parent.insertBefore(field, input);
      field.appendChild(label);
      field.appendChild(input);
    });

    var remember = qs('input[type=\"checkbox\"]', form);
    if (remember) {
      var rememberWrap = remember.closest('p') || remember.parentNode;
      if (rememberWrap) {
        rememberWrap.classList.add('lb-remember');
      }
    }

    var submit = qs('input[type=\"submit\"], button[type=\"submit\"]', form);
    if (submit) {
      var submitWrap = document.createElement('div');
      submitWrap.className = 'lb-submit';
      var p = submit.parentNode;
      p.insertBefore(submitWrap, submit);
      submitWrap.appendChild(submit);
    }

    card.appendChild(form);
    wrap.appendChild(card);

    document.body.insertBefore(wrap, document.body.firstChild);

    var typechoLogin = qs('.typecho-login');
    if (typechoLogin && !typechoLogin.contains(wrap)) {
      typechoLogin.classList.add('lb-hide');
    }

    var showToggle = {$jsShowToggle};
    if (showToggle) {
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'lb-theme-toggle';
      btn.setAttribute('aria-label', '切换主题');
      
      // SVG 太阳图标（暗色模式显示）
      var sunIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      sunIcon.setAttribute('viewBox', '0 0 24 24');
      sunIcon.setAttribute('fill', 'none');
      sunIcon.setAttribute('stroke', 'currentColor');
      sunIcon.setAttribute('stroke-width', '2');
      sunIcon.setAttribute('stroke-linecap', 'round');
      sunIcon.setAttribute('stroke-linejoin', 'round');
      sunIcon.setAttribute('class', 'lb-icon-sun');
      sunIcon.innerHTML = '<circle cx=\"12\" cy=\"12\" r=\"5\"/><line x1=\"12\" y1=\"1\" x2=\"12\" y2=\"3\"/><line x1=\"12\" y1=\"21\" x2=\"12\" y2=\"23\"/><line x1=\"4.22\" y1=\"4.22\" x2=\"5.64\" y2=\"5.64\"/><line x1=\"18.36\" y1=\"18.36\" x2=\"19.78\" y2=\"19.78\"/><line x1=\"1\" y1=\"12\" x2=\"3\" y2=\"12\"/><line x1=\"21\" y1=\"12\" x2=\"23\" y2=\"12\"/><line x1=\"4.22\" y1=\"19.78\" x2=\"5.64\" y2=\"18.36\"/><line x1=\"18.36\" y1=\"5.64\" x2=\"19.78\" y2=\"4.22\"/>';
      
      // SVG 月亮图标（亮色模式显示）
      var moonIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      moonIcon.setAttribute('viewBox', '0 0 24 24');
      moonIcon.setAttribute('fill', 'none');
      moonIcon.setAttribute('stroke', 'currentColor');
      moonIcon.setAttribute('stroke-width', '2');
      moonIcon.setAttribute('stroke-linecap', 'round');
      moonIcon.setAttribute('stroke-linejoin', 'round');
      moonIcon.setAttribute('class', 'lb-icon-moon');
      moonIcon.innerHTML = '<path d=\"M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z\"/>';
      
      btn.appendChild(sunIcon);
      btn.appendChild(moonIcon);
      
      btn.addEventListener('click', function(){
        var cur = document.documentElement.getAttribute('data-lb-theme') === 'dark' ? 'dark' : 'light';
        var next = cur === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-lb-theme', next);
        try{ localStorage.setItem('lb-theme', next); }catch(e){}
      });
      document.body.appendChild(btn);
    }
  })();
  </script>\n";

    if (trim($customJs) !== '') {
      echo "\n<script id=\"loginbeautify-custom-js\">\n";
      echo $customJs . "\n";
      echo "</script>\n";
    }
  }
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> d92f08e1d9663834e4742c3ab025c808d5af06fa
