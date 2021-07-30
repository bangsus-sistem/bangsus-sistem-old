import trialBalanceAccountGroup from './accounting/trial-balance-account-group';
import profitLossAccountGroup from './accounting/profit-loss-account-group';
import accountType from './accounting/account-type';

export default [
    ...trialBalanceAccountGroup,
    ...profitLossAccountGroup,
    ...accountType,
];
