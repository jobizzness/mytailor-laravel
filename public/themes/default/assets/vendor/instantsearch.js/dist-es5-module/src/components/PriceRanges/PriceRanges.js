'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _jsx = function () { var REACT_ELEMENT_TYPE = typeof Symbol === "function" && Symbol.for && Symbol.for("react.element") || 0xeac7; return function createRawReactElement(type, props, key, children) { var defaultProps = type && type.defaultProps; var childrenLength = arguments.length - 3; if (!props && childrenLength !== 0) { props = {}; } if (props && defaultProps) { for (var propName in defaultProps) { if (props[propName] === void 0) { props[propName] = defaultProps[propName]; } } } else if (!props) { props = defaultProps || {}; } if (childrenLength === 1) { props.children = children; } else if (childrenLength > 1) { var childArray = Array(childrenLength); for (var i = 0; i < childrenLength; i++) { childArray[i] = arguments[i + 3]; } props.children = childArray; } return { $$typeof: REACT_ELEMENT_TYPE, type: type, key: key === undefined ? null : '' + key, ref: null, props: props, _owner: null }; }; }();

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _Template = require('../Template.js');

var _Template2 = _interopRequireDefault(_Template);

var _PriceRangesForm = require('./PriceRangesForm.js');

var _PriceRangesForm2 = _interopRequireDefault(_PriceRangesForm);

var _classnames = require('classnames');

var _classnames2 = _interopRequireDefault(_classnames);

var _isEqual = require('lodash/lang/isEqual');

var _isEqual2 = _interopRequireDefault(_isEqual);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var PriceRanges = function (_React$Component) {
  _inherits(PriceRanges, _React$Component);

  function PriceRanges() {
    _classCallCheck(this, PriceRanges);

    return _possibleConstructorReturn(this, Object.getPrototypeOf(PriceRanges).apply(this, arguments));
  }

  _createClass(PriceRanges, [{
    key: 'componentWillMount',
    value: function componentWillMount() {
      this.refine = this.refine.bind(this);
    }
  }, {
    key: 'shouldComponentUpdate',
    value: function shouldComponentUpdate(nextProps) {
      return !(0, _isEqual2.default)(this.props.facetValues, nextProps.facetValues);
    }
  }, {
    key: 'getForm',
    value: function getForm() {
      var labels = _extends({
        currency: this.props.currency
      }, this.props.labels);

      var currentRefinement = void 0;
      if (this.props.facetValues.length === 1) {
        currentRefinement = {
          from: this.props.facetValues[0].from !== undefined ? this.props.facetValues[0].from : '',
          to: this.props.facetValues[0].to !== undefined ? this.props.facetValues[0].to : ''
        };
      } else {
        currentRefinement = { from: '', to: '' };
      }

      return _jsx(_PriceRangesForm2.default, {
        cssClasses: this.props.cssClasses,
        currentRefinement: currentRefinement,
        labels: labels,
        refine: this.refine
      });
    }
  }, {
    key: 'getItemFromFacetValue',
    value: function getItemFromFacetValue(facetValue) {
      var cssClassItem = (0, _classnames2.default)(this.props.cssClasses.item, _defineProperty({}, this.props.cssClasses.active, facetValue.isRefined));
      var key = facetValue.from + '_' + facetValue.to;
      var handleClick = this.refine.bind(this, facetValue.from, facetValue.to);
      var data = _extends({
        currency: this.props.currency
      }, facetValue);
      return _jsx('div', {
        className: cssClassItem
      }, key, _jsx('a', {
        className: this.props.cssClasses.link,
        href: facetValue.url,
        onClick: handleClick
      }, void 0, _react2.default.createElement(_Template2.default, _extends({ data: data, templateKey: 'item' }, this.props.templateProps))));
    }
  }, {
    key: 'refine',
    value: function refine(from, to, event) {
      event.preventDefault();
      this.props.refine(from, to);
    }
  }, {
    key: 'render',
    value: function render() {
      var _this2 = this;

      return _jsx('div', {}, void 0, _jsx('div', {
        className: this.props.cssClasses.list
      }, void 0, this.props.facetValues.map(function (facetValue) {
        return _this2.getItemFromFacetValue(facetValue);
      })), this.getForm());
    }
  }]);

  return PriceRanges;
}(_react2.default.Component);

PriceRanges.defaultProps = {
  cssClasses: {}
};

exports.default = PriceRanges;