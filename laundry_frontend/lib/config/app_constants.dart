class AppConstants {
  static const appName = 'Laundry App';

  static const _host = 'http://192.168.0.13:8000';

  /// ''' baseURL = 'http://192.168.0.13:8000/api' '''
  static const apiBaseUrl = '$_host/api';

  /// ''' baseURL = 'http://192.168.0.13:8000/storage' '''
  static const baseimageBaseUrl = '$_host/storage';

  static const laundryStatusCategory = [
    'All',
    'Pickup',
    'Queue',
    'Process',
    'Washing',
    'Dried',
    'Ironed',
    'Done',
    'Delivery',
  ];
}
