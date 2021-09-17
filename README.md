## Základní informace

- Přispěvatelé: djtoakley, miloskroulik
- Minimální verze PHP: 5.2.4
- Licence: [GPLv2 nebo novější](http://www.gnu.org/licenses/gpl-2.0.html)

# FFFČR Online Strike

Tento plugin umožňuje každému uživateli Wordpressu připojit se ke stávce za klima Fridays for Future Česká Republika 24. září 2021 pomocí několika kliknutí. Jedná se o banner, který v předstihu informuje o akci a volitelný celostránkový překryv v den akce.

## Jak to funguje a ukázka

Po instalaci tohoto pluginu a povolení widgetu FFFČR Online Strike prostřednictvím Nastavení v administraci Wordpressu se zobrazí banner v patičce ([ukázka](https://widget.zaklima.cz/demo)), který návštěvníky informuje, že vaše stránky podporují stávku za klima, a odkáže je na FB stránku události:

![A screenshot of the climate strike footer widget](https://widget.zaklima.cz/demo.png)

O půlnoci 24. září na 24 hodin se banner rozšíří na celou
obrazovku ([demo)](https://widget.zaklima.cz/demo) a zobrazí, že se vaše stránky na tento den
připojují k Earth Day Live, a nasměruje je, aby se připojili:

![A screenshot of the climate strike full page widget](https://widget.zaklima.cz/demo_full.png)

[comment]: <> (Pro ty, kteří nemohou své webové stránky na tento den vypnout, lze nakonfigurovat také možnost překryvu s možností)

[comment]: <> (zavření &#40;[ukázka&#41;]&#40;https://widget.earthdaylive2020.org/demo.html?fullPage\&showCloseButton&#41;:)

[comment]: <> (![A screenshot of the Earth Day Live full page widget with close button]&#40;https://widget.earthdaylive2020.org/EDL-mockup-overlay.png&#41;)

Widget je navržen tak, aby se zobrazil jednou za den u jednoho uživatele, na jednom zařízení, ale lze jej nakonfigurovat tak, aby se zobrazoval v jiném intervalu.

Widget je kompatibilní s prohlížeči Firefox, Chrome (desktop i mobilní), Safari (desktop i mobilní), Microsoft Edge a
Internet Explorer 11.

Widget lze přizpůsobit několika způsoby v sekci nastavení správce aplikace Wordpress. Jsou zde uvedeny podrobnosti o
tom, co jednotlivé možnosti dělají.

## Poznámka k softwaru třetích stran

Tento plugin na váš web vkládá skript, který je hostován na serveru spravovaném Fridays for Future Česká Republika. Pokud chcete přesně vidět, co se na stránku vkládá, podívejte se na [**soubor
widget.js**](https://github.com/miloskroulik/fffcr-strike-widget/blob/master/static/widget.js).

Licenci softwaru si můžete prohlédnout [zde](https://github.com/miloskroulik/fffcr-strike-widget/blob/master/LICENSE).

## Instalace

1. Nahrajte soubory zásuvného modulu do adresáře `/wp-content/plugins/fffcr-online-strike` nebo nainstalujte zásuvný modul
   přímo přes správu pluginů WordPress.
1. Aktivujte zásuvný modul prostřednictvím obrazovky pro správu pluginů ve WordPressu.
1. Pomocí stránky Nastavení->Nastavení FFFČR Online Strike aktivujte widget a nakonfigurujte jeho chování.

## Seznam změn

### 1.0.0
- Počáteční vydání
