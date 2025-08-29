// Dependencies
const { parallel, src, dest, watch } = require('gulp');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const shortColor = require('postcss-short-color');
const cleanCSS = require('gulp-clean-css');
const rollup = require('gulp-better-rollup');
const resolve = require('rollup-plugin-node-resolve');
const commonjs = require('rollup-plugin-commonjs');
const hash = require('gulp-hash');

// Folders
const npm = 'node_modules';
const dist = 'assets';

// Vendors
const vendors = {
	css: [`${npm}/normalize.css/normalize.css`, `${npm}/swiper/swiper-bundle.min.css`, `${npm}/aos/dist/aos.css`],
	js: [`${npm}/swiper/swiper-bundle.min.js`],
};

function vendorCSS(cb) {
	return src(vendors.css)
		.pipe(concat('vendor.css'))
		.pipe(cleanCSS())
		.pipe(dest(`${dist}/css`));
}

const vendorJS = () => {
	return src(vendors.js)
		.pipe(concat('vendor.js'))
		.pipe(hash())
		.pipe(dest(`${dist}/js`))
		.pipe(
			hash.manifest('./assets/assets.json', {
				deleteOld: true,
				sourceDir: `${__dirname}/${dist}/js`,
			})
		)
		.pipe(dest('.'));
};

// Assets
const assets = {
	scss: 'src/scss/*.scss',
	js: ['src/js/main.js'],
};

const css = () => {
	return src(assets.scss)
		.pipe(
			sass({
				includePaths: ['node_modules'],
				outputStyle: 'compressed',
			}).on('error', sass.logError)
		)
		.pipe(cleanCSS())
		.pipe(postcss([autoprefixer(), shortColor]))
		.pipe(hash())
		.pipe(dest(`${dist}/css`))
		.pipe(
			hash.manifest('./assets/assets.json', {
				// Generate the manifest file
				deleteOld: true,
				sourceDir: `${__dirname}/${dist}/css`,
			})
		)
		.pipe(dest('.'));
};

const cssWatch = () => {
	return src(assets.scss)
		.pipe(sourcemaps.init())
		.pipe(
			sass({
				includePaths: ['node_modules'],
			}).on('error', sass.logError)
		)
		.pipe(sourcemaps.write())
		.pipe(dest(`${dist}/css`));
};

const js = () => {
	return src(assets.js, {
		sourcemaps: false,
	})
		.pipe(rollup({ plugins: [babel(), resolve(), commonjs()] }, 'umd'))
		.pipe(
			uglify({
				mangle: true,
				compress: true,
			})
		)
		.pipe(hash())
		.pipe(dest(`${dist}/js`))
		.pipe(
			hash.manifest('./assets/assets.json', {
				// Generate the manifest file
				deleteOld: true,
				sourceDir: `${__dirname}/${dist}/js`,
			})
		)
		.pipe(dest('.'));
};

const jsWatch = () => {
	return src(assets.js, {
		sourcemaps: true,
	})
		.pipe(rollup({ plugins: [babel(), resolve(), commonjs()] }, 'umd'))
		.pipe(dest(`${dist}/js`));
};

// Watch
exports.watch = () => {
	watch('src/scss/**/*.scss', parallel(cssWatch));
	watch('src/js/**/*.js', jsWatch);
};

exports.js = js;
exports.vendorJS = vendorJS;
exports.vendorCSS = vendorCSS;
exports.vendors = parallel(vendorJS);
exports.css = css;
exports.default = parallel(vendorCSS, css, vendorJS, js);
